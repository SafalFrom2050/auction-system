<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('additional_details', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('value');
            $table->bigInteger('category_specific_detail_id')->unsigned()->nullable();
            $table->bigInteger('item_id')->unsigned()->nullable();

            $table->foreign('category_specific_detail_id')->references('id')->on('category_specific_details');
            $table->foreign('item_id')->references('id')->on('items');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('additional_details');
    }
}
