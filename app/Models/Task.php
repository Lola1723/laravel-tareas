<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //Permite guardar datos en la columna name
    protected $fillable = ['name', 'fecha'];

}
