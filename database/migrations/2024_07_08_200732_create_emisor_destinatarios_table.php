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
        Schema::create('emisor_destinatarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('codigo');
            $table->text('descripcion');
            $table->longText('firma_digital');
            $table->boolean('poner_firma')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emisor_destinatarios');
    }
};
