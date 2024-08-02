<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivos extends Model
{
    use HasFactory;
   
    protected $fillable =["numero_entrada","numero_salida","asunto","fecha","autordestinatario","procedencia_destino","camino_pc",
    "camino_en_archivo","descripcion","numero","revisado","entrada","documento_recibido","entregado_por","recibido_por"];
    protected $attributes = [
        'revisado' => 1
    ];

    public function autordestinatarioArchivo() {
        // $this->hasOne(Pregunta::class, 'id','IDp');
        return  $this->hasOne(Emisor_destinatarios::class,'id', 'autordestinatario');
    }

    public function getEntregado_por_personas_() {
        // $this->hasOne(Pregunta::class, 'id','IDp');
        return  $this->hasOne(Emisor_destinatarios::class,'id', 'entregado_por');
    }

    public function getRecibido_por_personas() {
        // $this->hasOne(Pregunta::class, 'id','IDp');
        return  $this->hasOne(Emisor_destinatarios::class,'id', 'recibido_por');
    }
    
    public function getProcedencia_destino() {
        // $this->hasOne(Pregunta::class, 'id','IDp');
        return  $this->hasOne(Procedencia::class,'id', 'procedencia_destino');
    }

    public function getCamino_en_archivo() {
        // $this->hasOne(Pregunta::class, 'id','IDp');
        return  $this->hasOne(Lista_archivo::class,'id', 'camino_en_archivo');
    }





}
