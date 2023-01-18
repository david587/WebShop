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
        Schema::create('orders', function (Blueprint $table) {
            $table->id("orders_id");
            $table->timestamp("orderDate");
            $table->string("shippingAddress");
            $table->integer("total");
            $table->string("paymentMethod")->nullable();
            $table->timestamps();
            $table->foreignId("product_id")->onDelete('cascade');
            $table->foreignId("user_id")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
