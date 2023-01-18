<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id("cartItems_id");
            $table->string("productName");
            $table->string("path");
            $table->integer("quantity");
            $table->integer("itemCost");
            $table->integer("totalCost");
            $table->foreignId("product_id")->onDelete('cascade');;
            $table->foreignId("user_id")->onDelete('cascade');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
    }
};
