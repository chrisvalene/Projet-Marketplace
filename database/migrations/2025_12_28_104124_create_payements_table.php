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
        Schema::create('payements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_commande')->constrained('commandes')->cascadeOnDelete();
            $table->foreignId('id_utilisateur')->constrained('utilisateurs')->cascadeOnDelete();
            $table->date('date_payement');
            $table->decimal('montant', 10, 2);
            $table->string('methode_payement');
            $table->date('date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payements');
    }
};
