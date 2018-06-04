<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('order_id');
            $table->string('order_status');
            $table->string('delivery_time');
            $table->integer('restaurant_id')->unsigned();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->text('restaurant_name');
            $table->text('dish_items'); // ID, Name, Quantity, Price
            $table->decimal('total',5,2);
            $table->string('payment_method');
            $table->string('shipping_name');
            $table->string('shipping_phone_number');
            $table->string('shipping_email');
            $table->text('shipping_address');
            $table->string('billing_name')->nullable();
            $table->string('billing_phone_number')->nullable();
            $table->string('billing_email')->nullable();
            $table->text('billing_address')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
