<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id')->nullable();
            $table->integer('shop_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('review_rating')->nullable();
            $table->string('review_title')->nullable();
            $table->string('experience')->nullable();
            $table->string('customer_location')->nullable();
            $table->bigInteger('likes')->default(0);
            $table->bigInteger('dislikes')->default(0);
            $table->string('verify_status')->default('verify');
            $table->string('status')->default('unpublish');
            $table->string('feature')->default('unfeatured');
            $table->string('real_fake')->default('real');
            $table->string('pending_status')->default('pending');
            $table->string('archive_status')->default('unarchive');
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
        Schema::dropIfExists('reviews');
    }
}
