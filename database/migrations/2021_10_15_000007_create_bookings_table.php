<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('members_reference');
            $table->string('mobile');
            $table->string('email');
            $table->string('passport');
            $table->foreignId('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips')->cascadeOnDelete();
            $table->foreignId('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignId('coupon_id')->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons')->cascadeOnDelete();
            $table->string('total_paid');
            $table->boolean('status')->default(0);
            $table->text('notes')->nullable();
            $table->string('period')->nullable();
            $table->date('period_from')->nullable();
            $table->date('period_to')->nullable();
            $table->foreignId('entry_id')->nullable();
            $table->string('payment_status')->default('pending');
            $table->text('payment_id')->nullable();
            $table->foreign('entry_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('added_by')->nullable();
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
        Schema::dropIfExists('bookings');
    }
}
