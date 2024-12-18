<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();
            $table->string('matricule', 20)->unique();
            $table->string('nom', 20);
            $table->string('prenom', 20);
            $table->string('mot_passe', 60);
            $table->string('filiere', 20)->nullable();
            $table->string('niveau', 20)->nullable();
            $table->string('telephone', 20)->nullable();
            $table->string('type', 20)->nullable();
            $table->string('cover', 20)->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurs');
    }
};
