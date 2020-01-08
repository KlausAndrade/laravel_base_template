<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('houses')) return;
        
            
        if (!Schema::hasColumn('houses', 'checkin')) return; 

           Schema::table('houses', function (Blueprint $table) {
                $table->dropColumn(['type', 'checkin', 'checkout', 'price', 'dedicated']);
            });

            
        Schema::table('houses', function (Blueprint $table) {
            $table->enum('type', ['house', 'apartment', 'others'])->default('apartment');
            $table->date('start')->nullable();
            $table->date('end')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
