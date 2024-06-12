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
        Schema::create('retiros', function (Blueprint $table) {
            $table->id();

            $table->dateTime('fecha');
            $table->decimal('cantidad', 15, 2);
            $table->enum('estado', ['fondos insuficientes', 'retiro exitoso']);
            $table->timestamps();
            $table->foreignId('user_id')->constrained('users')
            ->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retiros');
    }
};
