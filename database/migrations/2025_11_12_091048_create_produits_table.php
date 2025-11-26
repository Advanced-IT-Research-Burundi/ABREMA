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
        Schema::disableForeignKeyConstraints();

        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('designation_commerciale');
            $table->string('dci');
            $table->string('dosage');
            $table->string('forme');
            $table->string('conditionnement');
            $table->string('category');
            $table->string('nom_laboratoire');
            $table->string('pays_origine');
            $table->string('titulaire_amm');
            $table->string('pays_titulaire_amm');
            $table->integer('num_enregistrement');
            $table->date('date_amm')->nullable();
            $table->string('statut_amm')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
