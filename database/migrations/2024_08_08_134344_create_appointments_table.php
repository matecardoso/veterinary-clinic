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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('person_name');
            $table->string('email');
            $table->string('pet_name');
            $table->string('animal_type');
            $table->integer('age');
            $table->text('symptoms');
            $table->date('appointment_date');
            $table->enum('day_period', ['MORNING', 'AFTERNOON']);
            $table->foreignId('doctor_id')->constrained('users');
            $table->foreignId('receptionist_id')->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
