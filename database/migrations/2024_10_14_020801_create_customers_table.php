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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_document_type')->constrained('document_types')->onDelete('cascade');
            $table->string('document_number');
            $table->string('phone_number');
            $table->foreignId('id_departament')->constrained('departaments')->onDelete('cascade');
            $table->foreignId('id_city')->constrained('cities')->onDelete('cascade');
            $table->string('address');
            $table->string('neighborhood');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
