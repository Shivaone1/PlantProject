<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('title')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands'); //->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string('color')->nullable();
            $table->integer('size')->nullable();
            $table->integer('price')->nullable();
            $table->timestamps();
            // Indexing if needed
            // $table->index('brand_id');
            // $table->index('category_id');
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
};
