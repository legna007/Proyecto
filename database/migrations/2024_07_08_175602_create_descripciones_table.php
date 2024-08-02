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
        Schema::create('descripciones', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->integer('codigo');
            $table->text('descripcion');
            $table->timestamps();
            $table->boolean('activo')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descripciones');
    }
};
