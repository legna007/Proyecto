<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

   
    protected $fillable =["id","id_provincia","nombre","activo"];
     
    protected $attributes = [
      'activo' => 1
    ];
    public $timestamps=true;


}