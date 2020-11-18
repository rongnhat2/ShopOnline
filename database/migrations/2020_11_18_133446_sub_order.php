<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SubOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('category');
            $table->string('image_url');
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->integer('discount');
            $table->longText('detail');
            $table->string('description');
            $table->string('sex');
            $table->string('url');
            $table->string('color');
            $table->string('style');
            $table->string('composition');
            $table->string('property');
            $table->string('size');
            $table->integer('amount');
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
        Schema::dropIfExists('sub_order');
    }
}
