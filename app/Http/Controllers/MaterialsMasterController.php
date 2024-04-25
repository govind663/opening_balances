<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Meterial;
use Illuminate\Support\Facades\DB;

class MaterialsMasterController extends Controller
{
    public function index()
    {

        $Meterial =  DB::table('material AS t1')
                    ->select('t1.*', 't2.raw_material')
                    ->leftJoin('category AS t2', 't2.id', '=', 't1.category_id')

                    ->whereNull('t1.deleted_at')
                    ->whereNull('t2.deleted_at')
                    ->orderBy('t1.id', 'DESC')
                    ->get();
        // dd($Meterial);

        return view('materials.grid',compact('Meterial'));
    }


    public function create()
    {
        $Category = Category::orderBy('id','desc')->pluck('raw_material', 'id')->whereNull('deleted_at');
        // dd($category);

        return view('materials.create', compact('Category'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'material_name' => 'required',
          'opening_balance' => 'required|decimal:2|min:0',

         ],[
          'material_name.required' => 'Material Name is required',
          'opening_balance.required' => 'Opening Balance is required',
          'opening_balance.decimal' => 'Opening Balance must be a number with 2 decimal places',
          ]);

        $data = new Meterial();

        $data->category_id = $request->get('category_id');
        $data->material_name = $request->get('material_name');
        $data->opening_balance = $request->get('opening_balance');

        $data->inserted_dt = date("Y-m-d H:i:s");
        $data->save();


        $sub = 'MAT-000'.$data->id;
        $update = [
            'unique_id' => $sub ,
        ];

        Meterial::where('id', $request->data)->update($update);


        return redirect('/materials_master')->with('message','Your Meterial Added Successfully.');
    }


    public function show($id)
    {
        $data = Meterial::find($id);
        $Category = Category::orderBy('id','desc')->pluck('raw_material', 'id')->whereNull('deleted_at');

        return view('materials.view',compact('data', 'Category'));
    }


    public function edit($id)
    {
        $data = Meterial::find($id);
        $Category = Category::orderBy('id','desc')->pluck('raw_material', 'id')->whereNull('deleted_at');

        return view('materials.edit',compact('data', 'Category'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'material_name' => 'required',
            'opening_balance' => 'required|decimal:2|min:0',

           ],[
            'material_name.required' => 'Material Name is required',
            'opening_balance.required' => 'Opening Balance is required',
            'opening_balance.decimal' => 'Opening Balance must be a number with 2 decimal places',
            ]);

        $data = Meterial::find($id);

        $data->category_id = $request->get('category_id');
        $data->material_name = $request->get('material_name');
        $data->opening_balance = $request->get('opening_balance');

        $data->modified_dt = date("Y-m-d H:i:s");
        $data->save();


      return redirect('/materials_master')->with('message','Your Meterial Updated Successfully.');
    }


    public function destroy($id)
    {
        $data = Meterial::findOrFail($id);
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect('/materials_master')->with('message','Your Meterial Deleted Successfully.');
    }
}


