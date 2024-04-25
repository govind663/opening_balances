<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Meterial;
use App\Models\InwardOutwardQuantity;
use Illuminate\Support\Facades\DB;

class INwardOutwardMasterController extends Controller
{
    public function index()
    {

        $inward_outward_quantity =  DB::table('inward_outward_quantity_tabel AS t1')
                                    ->select('t1.*', 't2.raw_material', 't3.material_name', 't3.opening_balance')
                                    ->leftJoin('category AS t2', 't2.id', '=', 't1.category_id')
                                    ->leftJoin('material AS t3', 't3.id', '=', 't1.material_name_id')
                                    ->whereNull('t1.deleted_at')
                                    ->whereNull('t2.deleted_at')
                                    ->whereNull('t3.deleted_at')
                                    ->orderBy('t1.id', 'DESC')
                                    ->get();
        // dd($inward_outward_quantity);

        return view('inward_outward.grid',compact('inward_outward_quantity'));
    }


    public function create()
    {
        $Category = Category::orderBy('id','desc')->pluck('raw_material', 'id')->whereNull('deleted_at');
        // dd($category);

        $Material = Meterial::orderBy('id','desc')->pluck('material_name', 'id')->whereNull('deleted_at');
        // dd($Material);

        return view('inward_outward.create', compact('Category','Material'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'category_id' => 'required',
          'material_name_id' => 'required',
          'date' => 'required',
          'inward_outward_quantity' => 'required',

         ],[
          'category_id.required' => 'Material Category is required',
          'material_name_id.required' => 'Material Name is required',
          'date.required' => 'Date is required',
          'inward_outward_quantity.required' => 'Material Inward Outward Quantity is required',
          ]);

        $data = new InwardOutwardQuantity();

        $data->category_id = $request->get('category_id');
        $data->material_name_id = $request->get('material_name_id');
        $data->date = date("Y-m-d", strtotime($request->date));
        $data->inward_outward_quantity = $request->get('inward_outward_quantity');

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->save();


        $sub = 'MAT_IN/OUT-000'.$data->id;
        $update = [
            'unique_id' => $sub ,
        ];

        InwardOutwardQuantity::where('id', $request->data)->update($update);


        return redirect('/inward_outward_quantity_master')->with('message','Your Inward/Outward Quantity Added Successfully.');
    }


    public function show($id)
    {
        $data = InwardOutwardQuantity::find($id);
        $Category = Category::orderBy('id','desc')->pluck('raw_material', 'id')->whereNull('deleted_at');
        $Material = Meterial::orderBy('id','desc')->pluck('material_name', 'id')->whereNull('deleted_at');

        return view('inward_outward.view',compact('data', 'Category', 'Material'));
    }


    public function edit($id)
    {
        $data = InwardOutwardQuantity::find($id);
        $Category = Category::orderBy('id','desc')->pluck('raw_material', 'id')->whereNull('deleted_at');
        $Material = Meterial::orderBy('id','desc')->pluck('material_name', 'id')->whereNull('deleted_at');

        return view('inward_outward.edit',compact('data', 'Category', 'Material'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'material_name_id' => 'required',
            'date' => 'required',
            'inward_outward_quantity' => 'required',

           ],[
            'category_id.required' => 'Material Category is required',
            'material_name_id.required' => 'Material Name is required',
            'date.required' => 'Date is required',
            'inward_outward_quantity.required' => 'Material Inward Outward Quantity is required',
            ]);

        $data = InwardOutwardQuantity::find($id);

        $data->category_id = $request->get('category_id');
        $data->material_name_id = $request->get('material_name_id');
        $data->date = date("Y-m-d", strtotime($request->date));
        $data->inward_outward_quantity = $request->get('inward_outward_quantity');

        $data->modified_dt = date("Y-m-d H:i:s");
        $data->save();


      return redirect('/inward_outward_quantity_master')->with('message','Your Inward/Outward Quantity Updated Successfully.');
    }


    public function destroy($id)
    {
        $data = InwardOutwardQuantity::findOrFail($id);
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect('/inward_outward_quantity_master')->with('message','Your Inward/Outward Quantity Deleted Successfully.');
    }


    // Material Name List
    public function Material_Name_List(Request $request)
    {

        $category_id = $request->category_id;

        $data['materialnamelist']= DB::select("SELECT id, material_name FROM `material` WHERE category_id = '$category_id' AND deleted_at IS NULL ORDER BY `material`.`id` DESC");

        return response()->json($data);
    }
}


