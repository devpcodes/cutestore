<?php

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
        Schema::drop('orders');
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ordno',20);
            $table->boolean('ispay')->default(0);
            $table->dateTime('order_date');
            $table->integer('order_price');
            $table->string('order_memo',30);
            $table->integer('pay_type');
            $table->string('pay_memo',100);
            $table->integer('send_type')->defautl(0);
            $table->dateTime('send_date');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('orders');
    }
}
