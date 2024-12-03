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
        Schema::create('services_group', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_services')->constrained('services_list')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_diagnosis')->nullable();
            $table->enum('status', ['approved', 'pending', 'completed', 'cancelled'])->default('pending');
            $table->date('tanggal_periksa')->nullable();
            $table->timestamps();

            $table->foreign('id_diagnosis')->references('id')->on('diagnosis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_group');
    }
};