<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('is_available')->default(1);
            $table->integer('order_pos')->default(0);
            $table->string('food_name');
            $table->string('description')->nullable();
            $table->decimal('price',5,2);
            $table->decimal('sales_price',5,2)->nullable();
            $table->string('food_image')->nullable();
            $table->integer('restaurant_id')->unsigned();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->string('restaurant_name');
            $table->string('food_categories');
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
        Schema::dropIfExists('food_lists');
    }
}
