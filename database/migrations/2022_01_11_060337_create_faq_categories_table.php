<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('faq_categories', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->boolean('is_parent')->default(0)->nullable();
            $table->bigInteger('parent_cat_id')->unsigned()->nullable();

            $table->foreign('parent_cat_id')->references('id')->on('faq_categories')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('faq_categories');
    }
}
