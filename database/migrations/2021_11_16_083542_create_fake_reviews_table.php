<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakeReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fake_reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('shop_id')->nullable();
            $table->integer('total_reviews')->nullable();
            $table->integer('rating')->nullable();
            $table->integer('five_star')->nullable();
            $table->integer('four_star')->nullable();
            $table->integer('three_star')->nullable();
            $table->integer('two_star')->nullable();
            $table->integer('one_star')->nullable();
            $table->string('status')->default('real');
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
        Schema::dropIfExists('fake_reviews');
    }
}
