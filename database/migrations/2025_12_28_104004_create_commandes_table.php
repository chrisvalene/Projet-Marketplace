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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_utilisateur')->constrained('utilisateurs')->cascadeOnDelete();
            $table->foreignId('id_march')->constrained('marches')->cascadeOnDelete();
            $table->date('date_commande');
            $table->decimal('total', 10, 2);
            $table->string('statut');
            $table->text('adresse_livraison');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
