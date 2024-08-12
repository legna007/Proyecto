<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;

    protected $table="provincia";

      protected $fillable =["id","nombre","activo"];
      protected $attributes = [
        'activo' => 1
      ];



      public function getmunicipio() {
        // $this->hasOne(Pregunta::class, 'id','IDp');
        return  $this->hasOne(Provincia::class,'id', 'municipio');
    }

}
