<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meterial extends Model
{
    use SoftDeletes;
    protected $table='material';
    public $timestamps = false;


    protected $fillable = [
        'id',
        'unique_id',
        'category_id',
        'material_name',
        'opening_balance',
        'inserted_dt',
        'modified_dt',
        'deleted_at',
    ];

    protected $dates = ['deleted_at'];
}
