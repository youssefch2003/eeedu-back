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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); // nom (varchar)
            $table->string('prenom'); // prenom (varchar)
            $table->string('email')->unique(); // email (varchar) with unique constraint
            $table->string('telephone'); // telephone (varchar)
            $table->string('mot_de_passe'); // mot_de_passe (varchar)
            $table->date('date_naissance'); // date_naissance (date)
            $table->string('genre'); // genre (varchar)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
