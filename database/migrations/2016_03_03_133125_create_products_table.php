<?php

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
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->timestamps();
        });
        Schema::create('categorys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->integer('series_id')->unsigned();
            $table->foreign('series_id')->references('id')->on('series');
            $table->timestamps();
        });
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('description1',50);
            $table->string('description2',50);
            $table->integer('price');
            $table->json('images');
            $table->json('items');
            $table->text('content');
            $table->integer('view');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categorys');
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
        Schema::drop('products');
    }
}
