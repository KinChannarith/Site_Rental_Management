<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyPaymentVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthlyPaymentVouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vendor_name', 50)->nullable();
            $table->string('vattin', 50)->nullable();
            $table->string('voucher', 50)->nullable();
            $table->string('monthlyPaymentID', 50)->nullable();       
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
        Schema::dropIfExists('monthlyPaymentVouchers');
    }
}
