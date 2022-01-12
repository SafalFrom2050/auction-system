<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuctionsTable extends Migration
{
    public function up()
    {
        Schema::create('auctions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('heading');
            $table->text('description');
            $table->string('image_url')->nullable();
            $table->string('location');
            $table->dateTime('date_time');
            $table->dateTime('end_date')->default('2022-08-07');
            $table->string('period');
            $table->string('status')->default('open');
            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('auctions');
    }
}
