
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('matricule');
            $table->unsignedBigInteger('id_livre');
            $table->date('date_reservation');
            $table->date('date_emprunt')->nullable();
            $table->date('date_retour')->nullable();
            $table->boolean('is_loan')->default(false);
            $table->boolean('livre_rendu')->default(false);
            $table->string('status')->default('pending');
            $table->boolean('is_reservation')->default(true);
            $table->timestamps();

            // Clés étrangères
            $table->foreign('matricule')->references('matricule')->on('utilisateurs')->onDelete('cascade');
            $table->foreign('id_livre')->references('id')->on('livres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
