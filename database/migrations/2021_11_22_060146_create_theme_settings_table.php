<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemeSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->id();
            $table->string('shop_id')->nullable();
            $table->string('stars')->default('#ffd200');
            $table->string('filled_stars')->default('grey');
            $table->string('unfilled_stars')->default('#e1dddd');
            $table->string('bar_filled')->default('#005e9e');
            $table->string('bar_unfilled')->default('#f1f1f1');
            $table->string('text')->default('black');
            $table->string('tabs_background')->default('#eee');
            $table->string('tabs_counter_background')->default('#f8f9fa');
            $table->string('tabs_border_bottom')->default('#005e9e');
            $table->string('circle_background')->default('#005e9e');
            $table->string('circle_text')->default('white');
            $table->string('reply_border')->default('#d1d1d1');
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
        Schema::dropIfExists('theme_settings');
    }
}
