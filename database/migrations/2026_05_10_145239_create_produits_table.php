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
        Schema::create('produits', function (Blueprint $table) {
          $table->id();                    // clé primaire auto-incrémentée (1, 2, 3...)
          $table->string('name');          // nom du produit ex: "iPhone 15"
          $table->string('slug')->unique();// URL propre ex: "iphone-15" (pour les liens)
          $table->text('description');     // description longue du produit
          $table->text('specifications')->nullable();   // fiche technique (nullable = peut être vide)
          $table->decimal('price', 10, 2); // prix ex: 999.99 (10 chiffres, 2 décimales)
          $table->string('image') ->nullable();       // chemin vers l'image ex: "images/iphone.jpg"
          $table->json('options') ->nullable();        // options en JSON ex: {"couleurs":["rouge","bleu"]}
          $table->boolean('is_featured') ->default(false);   // produit à la une ? true/false
          $table->boolean('availability') ->default(true); // disponible ? true/false
      
          $table->timestamps();            // created_at et updated_at automatiques
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
