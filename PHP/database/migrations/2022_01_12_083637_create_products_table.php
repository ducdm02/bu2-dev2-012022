<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('product_id');
            $table->string('product_name',128);
            $table->integer('product_quantity');
            $table->integer('category_id');
            $table->integer('producer_id');
            $table->text('product_desc',1024);
            $table->integer('product_price');
            $table->text('product_image');
            $table->tinyInteger('product_status');
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
        Schema::dropIfExists('products');
    }
}
