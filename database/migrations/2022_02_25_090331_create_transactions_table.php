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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('timeout');
            $table->string('address')->nullable();
            $table->string('regency');
            $table->string('province');
            $table->bigInteger('total');
            $table->bigInteger('shipping_cost');
            $table->bigInteger('sub_total');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('courier_id')->constrained('couriers');
            $table->string('proof_of_payment')->nullable();
            $table->enum('status', ['Telah Sampai', 'Dalam Pengiriman', 'Dibatalkan', 'Belum Terbayar', 'Pending', 'Expired']);
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
        Schema::dropIfExists('transactions');
    }
};