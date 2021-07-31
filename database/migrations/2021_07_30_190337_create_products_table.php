<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('storage');
            $table->string('colors');
            $table->string('ram');
            $table->enum('locked', ['locked', 'unlocked'])->default('unlocked');
            $table->string('warranty');
            $table->string('sell_price');
            $table->string('original_price');
            $table->string('desc');
            $table->string('display');
            $table->string('cameraMp');
            $table->integer('model_id');

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
        Schema::dropIfExists('products');
    }
}
