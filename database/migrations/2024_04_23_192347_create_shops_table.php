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
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('low_price')->nullable();
            $table->integer('high_price')->nullable();
            $table->string('open')->nullable();
            $table->string('close')->nullable();
            $table->integer('postal')->nullable();
            $table->string('address')->nullable();
            $table->integer('tell')->nullable();
            $table->string('holiday')->nullable();
            $table->string('map')->nullable();
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
        Schema::dropIfExists('shops');
    }
};
