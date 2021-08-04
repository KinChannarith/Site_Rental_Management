<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthlyPayments', function (Blueprint $table) {
                $table->increments('id');
                $table->string('newID', 10);
                $table->string('oldID', 50)->nullable();
                $table->string('status', 50)->nullable();
                $table->string('address', 500);
                $table->string('fullname', 255);
                $table->string('contact', 255);
                $table->datetime('paymonth');
                $table->datetime('paydate');
                $table->string('description', 255);
                $table->string('remark', 500)->nullable();
                $table->string('userCreated', 500)->nullable();
                $table->string('lastUserEdited', 500)->nullable();
                $table->string('userDeleted', 500)->nullable();
                $table->tinyInteger('isDeleted')->default(0);
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
        Schema::dropIfExists('monthlyPayments');
    }
}
