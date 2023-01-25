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
        Schema::create('orderInfos', function (Blueprint $table) {
            $table->id();
            $table->string("shippingAddress");
            $table->string("phone");
            $table->string("paymentMethod")->nullable();
            $table->foreignId("order_id")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderInfos');
    }
};
