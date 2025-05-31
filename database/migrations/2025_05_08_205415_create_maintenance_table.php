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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('id_machine')->constrained('machines')->onDelete('cascade');
            $table->date('maintenance_date_start');
            $table->date('maintenance_date_end')->nullable();
            $table->foreignId('type')->constrained('maintenance_types')->onDelete('cascade');
            $table->timestamps(); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
