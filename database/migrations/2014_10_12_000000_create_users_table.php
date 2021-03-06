<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('role_id')->default(4);
            $table->string('fname');
            $table->string('lname');
            $table->string('image')->nullable();
            $table->string('nationalcode')->nullable();
            $table->boolean('nocode')->default(0)->comment('not irani');
            $table->string('mobile')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('bankcard')->nullable();
            $table->boolean('newsletter')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
