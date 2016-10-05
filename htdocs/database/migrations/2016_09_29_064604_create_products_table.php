<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('products', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->text('description');
          $table->text('content');
          $table->double('price');
          $table->string('image');
          $table->string('code');
          $table->boolean('top');
          $table->boolean('new');
          $table->boolean('pro');
          $table->boolean('home');
          $table->integer('cate_id');
          $table->softDeletes();
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
