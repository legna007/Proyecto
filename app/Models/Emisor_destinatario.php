<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Emisor_destinatario extends Model
{
    use HasFactory;

    protected $fillable =["descripcion","firma_digital","poner_firma"];

    protected $attributes = [
        'firma_digital' => ''
    ];


    public function archivosDesdeAutorDestinatario(): HasMany
    {
        return $this->HasMany(Archivos::class, 'autordestinatario');

    }
    public function archivosDesdeEntregado(): HasOne
    {
        return $this->hasOne(Archivos::class, 'entregado_por');

    }
    public function archivosDesdeRecibido(): HasOne
    {
        return $this->hasOne(Archivos::class, 'recibido_por');

}

}