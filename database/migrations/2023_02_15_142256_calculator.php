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
        Schema::create('calculator', function (Blueprint $table) {
            $table->id();
            $table->string('calculated_value');
            $table->boolean('status')->default('1');
            $table->boolean('is_deleted')->default('0');
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
        //
    }
};
