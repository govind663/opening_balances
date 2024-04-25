<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table='category';
    public $timestamps = false;


    protected $fillable = [
        'id',
        'material_id',
        'raw_material',
        'finish_goods',
        'spares',
        'machines',
        'others',
        'inserted_dt',
        'modified_dt',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];
}
