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
          $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
          $table->json('products');
          $table->decimal('total_price', 10, 2);
          $table->enum('status', [
             'pending'  ,
             'confirmed' ,
             'shipped' ,
             'delivered' ,
             'cancelled' ,
           ])->default('pending');
         $table->string('shipping_address');
         $table->string('shipping_city');
         $table->string('shipping_postal_code');
         $table->string('shipping_country')->default('France');

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
