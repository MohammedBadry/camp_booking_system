<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('title');
            $table->text('description');
            $table->integer('capacity')->nullable();
            $table->string('size')->nullable();
            $table->integer('from')->nullable();
            $table->integer('to')->nullable();
            $table->integer('camps_num')->nullable();
            $table->string('price');
            $table->date('trip_date')->nullable();
            $table->foreignId('type_id');
            $table->foreign('type_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignId('operator_id');
            $table->foreign('operator_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('image');
            $table->text('notes')->nullable();
            $table->string('period')->nullable();
            $table->boolean('status')->default(1);
            $table->foreignId('added_by');
            $table->foreign('added_by')->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('trips');
    }
}
