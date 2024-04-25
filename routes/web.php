<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryMasterController;
use App\Http\Controllers\MaterialsMasterController;
use App\Http\Controllers\INwardOutwardMasterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('category_master.index');
});

// ========= Category Master
Route::resource('/category_master', CategoryMasterController::class);


// ========= Materials Master
Route::resource('/materials_master', MaterialsMasterController::class);


// ========= Inward/Otward Quantity Master
Route::resource('/inward_outward_quantity_master', INwardOutwardMasterController::class);


// =============  Get Material Name List With Dependent Dropdown
Route::post('/material_name_list', [INwardOutwardMasterController::class, 'Material_Name_List'])->name('material_name_list');
