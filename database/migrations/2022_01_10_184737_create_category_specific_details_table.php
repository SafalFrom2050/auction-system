<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategorySpecificDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('category_specific_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');

            $table->bigInteger('category_id')->unsigned()->nullable();

            $table->foreign('category_id')->references('id')->on('categories');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('category_specific_details');
    }
}
