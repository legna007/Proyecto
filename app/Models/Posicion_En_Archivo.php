<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posicion_En_Archivo extends Model
{
    use HasFactory;
    protected $table="descripciones";
    protected $fillable =["descripcion"];
    
    public $timestamps=true;
}
