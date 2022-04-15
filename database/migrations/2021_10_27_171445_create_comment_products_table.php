<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_products', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('name');
            $table->enum('rate', [1, 2, 3, 4, 5])->nullable();
            $table->enum('status', [0, 1])->default(0);
            $table->text('message');
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
        Schema::dropIfExists('comment_products');
    }
}
