<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tests', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('BeltID')->unsigned();
            $table->string('Name');

            $table->foreign('BeltId')
                ->references('Id')->on('Belts')
                ->onDelete('cascade');
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('Tests');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
