<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Procedencia extends Model
{
    use HasFactory;

    protected $table="procedencia";

      protected $fillable =["descripcion","activo"];
      protected $attributes = [
        'activo' => 1
      ];

      public function archivosDesdeProcedencia_destino(): HasMany
    {
        return $this->HasMany(Archivos::class, 'procedencia_destino');

    }
     
}
