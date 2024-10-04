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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_document_type')->constrained('document_types')->onDelete('cascade');
            $table->integer('document_number');
            $table->string('name');
            $table->string('lastname');
            $table->string('phone_number');
            $table->foreignId('id_license_type')->constrained('license_types')->onDelete('cascade');
            $table->string('experiencia');
            $table->string('disponibilidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
