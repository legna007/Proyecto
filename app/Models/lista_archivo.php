<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Lista_archivo extends Model
{
    use HasFactory;

    protected $table ='lista_archivo';

    protected $fillable =["descripcion"];
    
    public function archivosDesdeCamino(): HasMany
    {
        return $this->HasMany(Archivos::class, 'camino_en_archivo');


}
}