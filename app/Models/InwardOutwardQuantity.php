<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InwardOutwardQuantity extends Model
{
    use SoftDeletes;
    protected $table='inward_outward_quantity_tabel';
    public $timestamps = false;


    protected $fillable = [
        'id',
        'unique_id',
        'category_id',
        'material_name_id',
        'date',
        'inward_outward_quantity',
        'inserted_dt',
        'modified_dt',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];
}
