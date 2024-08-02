<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('archivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('numero_entrada');
            $table->integer('numero_salida');
            $table->string('asunto');
            $table->date('fecha');
            $table->unsignedBigInteger('autordestinatario');
            $table->unsignedBigInteger('procedencia_destino');
            $table->longText('camino_pc');
            $table->unsignedBigInteger('camino_en_archivo');
            $table->text('descripcion');
            $table->integer('numero');
            $table->boolean('revisado')->default(false);
            $table->boolean('entrada')->default(false);
            $table->longText('documento_recibido');
            $table->unsignedBigInteger('entregado_por');
            $table->unsignedBigInteger('recibido_por');
            $table->string('observaciones')->nullable();
            $table->timestamps();

            $table->foreign('autordestinatario')->references('id')->on('emisor_destinatarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('procedencia_destino')->references('id')->on('procedencia')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('camino_en_archivo')->references('id')->on('lista_archivo')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('entregado_por')->references('id')->on('emisor_destinatarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('recibido_por')->references('id')->on('emisor_destinatarios')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
    }
};
