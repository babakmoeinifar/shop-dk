<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributeFieldProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_field_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('attribute_field_id');
            $table->unsignedInteger('product_id');
            $table->foreign('attribute_field_id')->references('id')->on('attribute_fields')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attribute_field_product');
    }
}
