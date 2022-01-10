<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lot_no')->unique();
            $table->string('artist');
            $table->string('classification');
            $table->date('production_date');
            $table->string('title');
            $table->string('est_price');
            $table->text('description');
            $table->string('image_url');

            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->bigInteger('auction_id')->unsigned()->nullable();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('auction_id')->references('id')->on('auctions');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
