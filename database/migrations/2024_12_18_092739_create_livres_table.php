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
    Schema::create('livres', function (Blueprint $table) {
        $table->id();
        $table->string('titre', 20);
        $table->string('auteur', 20);
        $table->unsignedInteger('rate')->default(0);
        $table->string('maison_edition', 20);
        $table->string('categorie', 20);
        $table->string('cover', 20)->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livres');
    }
};
