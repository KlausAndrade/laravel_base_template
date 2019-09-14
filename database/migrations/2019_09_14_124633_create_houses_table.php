<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('country');
            $table->string('address');
            $table->string('number');
            $table->string('city');
            $table->string('state');
            $table->string('zipcode');
            $table->enum('type', ['house', 'apartment']);
            $table->enum('space', ['entire', 'private-room','shared-room']);
            $table->boolean('dedicated');
            $table->float('price');
            $table->date('checkin');
            $table->date('checkout');
            $table->integer('guests');
            $table->integer('rooms');
            $table->longText('description');
            $table->boolean('active')->default(true);;
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('houses');
    }
}
