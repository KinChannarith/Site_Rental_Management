<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->increments('id');
            $table->string('newID', 10)->unique();
            $table->string('oldID', 50)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('address', 500);
            $table->string('initialStatus', 10)->nullable();
            $table->string('fullname', 255);
            $table->string('contact', 255);
            $table->string('ownerAddress', 500)->nullable();
            $table->string('bankName', 500)->nullable();
            $table->string('bankAccountName', 500)->nullable();
            $table->string('bankAccountNumber', 500)->nullable();
            $table->datetime('startDate');
            $table->datetime('endDate');
            $table->string('noYear',255);
            $table->double('netFee',2)->default(0);
            $table->integer('pmtMethod');
            $table->string('dueDate',500)->nullable();
            $table->string('remark',500)->nullable();
            $table->string('remark2',500)->nullable();
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
        Schema::dropIfExists('sites');
    }
}

