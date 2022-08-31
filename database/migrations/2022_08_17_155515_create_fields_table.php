<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('address');
            $table->string('type');
            $table->string('option');
            $table->string('size');
            $table->string('image');
            $table->integer('status');
            $table->timestamp('time_open');
            $table->timestamp('time_close');
            $table->unsignedBigInteger('id_manager');
            $table->foreign('id_manager')->references('id')->on('managers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fields');
    }
}
