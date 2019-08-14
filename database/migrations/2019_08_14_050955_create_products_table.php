<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedInteger('category_id')->index();
            $table->string('name');
            $table->string('code', 20)->nullable();
            $table->string('country', 20)->nullable();
            $table->string('image');
            $table->string('price', 50);
            $table->string('unit', 20);
            $table->integer('stock')->default('0');
            $table->text('desc')->nullable()->comment('description');
            $table->boolean('is_active')->default('0');
            $table->string('meta_keywords', 191)->nullable();
            $table->boolean('feature')->default(0)->comment('check it for feature');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
