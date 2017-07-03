<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Belts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Belts', function (Blueprint $table) {
            $table->increments('Id');
            $table->string('Name');
            $table->string('Picture');
            $table->timestamps();
        });

        Schema::table('Users', function($table) {
        $table->foreign('BeltId')
            ->references('Id')
            ->on('Belts')
            ->OnDelete('set null');
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
        Schema::dropIfExists('Belts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
