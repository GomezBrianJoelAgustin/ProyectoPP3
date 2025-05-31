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
        Schema::create('machine_works', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->date('date_start');
            $table->date('date_end')->nullable();
            $table->unsignedBigInteger('reason_end')->nullable(); // Primero definís la columna nullable
            $table->foreign('reason_end')->references('id')->on('reason_ends')->onDelete('cascade');
            $table->integer('km_travel')->nullable();
            $table->foreignId('id_machines')->constrained('machines')->onDelete('cascade');
            $table->foreignId('id_works')->constrained('works')->onDelete('cascade');
            $table->timestamps(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine_works');
    }
};
