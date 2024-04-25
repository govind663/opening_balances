<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryMasterController extends Controller
{
    public function index()
    {
        $Category = Category::orderBy('id', 'DESC')->get();
        // dd($Category);

        return view('master.category.grid',compact('Category'));
    }


    public function create()
    {
        return view('master.category.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
          'raw_material' => 'required',
          'finish_goods' => 'required',
          'spares' => 'required',
          'machines' => 'required',
          'others' => 'required',

         ],[
          'raw_material.required' => 'Raw Material is required',
          'finish_goods.required' => 'Finish Goods is required',
          'spares.required' => 'Spares is required',
          'machines.required' => 'Machines is required',
          'others.required' => 'Others is required',
          ]);

        $data = new Category();

        $data->raw_material = $request->get('raw_material');
        $data->finish_goods = $request->get('finish_goods');
        $data->spares = $request->get('spares');
        $data->machines = $request->get('machines');
        $data->others = $request->get('others');
        $data->inserted_dt = date("Y-m-d H:i:s");

        // === generated Unique and auto incrementing id with six digit ===
        $data->material_id = 'MAT'.sprintf('%06d', $data->id);

        $data->save();

        return redirect('/category_master')->with('message','Your Category Added Successfully.');
    }


    public function show($id)
    {
        $data = Category::find($id);

        return view('master.category.view',compact('data'));
    }


    public function edit($id)
    {
        $data = Category::find($id);

        return view('master.category.edit',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'raw_material' => 'required',
            'finish_goods' => 'required',
            'spares' => 'required',
            'machines' => 'required',
            'others' => 'required',

           ],[
            'raw_material.required' => 'Raw Material is required',
            'finish_goods.required' => 'Finish Goods is required',
            'spares.required' => 'Spares is required',
            'machines.required' => 'Machines is required',
            'others.required' => 'Others is required',
            ]);

        $data = Category::find($id);

        $data->raw_material = $request->get('raw_material');
        $data->finish_goods = $request->get('finish_goods');
        $data->spares = $request->get('spares');
        $data->machines = $request->get('machines');
        $data->others = $request->get('others');

        $data->modified_dt = date("Y-m-d H:i:s");
        $data->save();


      return redirect('/category_master')->with('message','Your Category Updated Successfully.');
    }


    public function destroy($id)
    {
        $data = Category::findOrFail($id);
        $data->deleted_at = date("Y-m-d H:i:s");
        $data->update();

        return redirect('/category_master')->with('message','Your Category Deleted Successfully.');
    }
}


