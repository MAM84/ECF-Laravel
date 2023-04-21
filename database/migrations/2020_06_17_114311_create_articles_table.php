<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->text('description');
            $table->decimal('price', 6, 2);
            $table->bigInteger('genre_id')->unsigned();
            $table->bigInteger('substance_id')->unsigned();
            $table->bigInteger('color_id')->unsigned();
            $table->bigInteger('section_id')->unsigned();
            $table->smallInteger('quantity');
            $table->string('picture', 255);
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
        Schema::dropIfExists('articles');
    }
}
