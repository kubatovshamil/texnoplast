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
            //category_id
            $table->string('title');
            $table->float('price');
            $table->text('specification');
            $table->enum('status', [0, 1])->default(1);
            $table->integer('discount');
            $table->string('img');
            $table->string('slug');
            $table->string('keywords');
            $table->string('descriptions');
            $table->enum('hit', [0, 1])->default(0);
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
