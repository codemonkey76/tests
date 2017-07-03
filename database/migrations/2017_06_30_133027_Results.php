<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Results extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Results', function (Blueprint $table) {
            $table->integer('TestId')->unsigned();
            $table->integer('UserId')->unsigned();
            $table->integer('QuestionId')->unsigned();
            $table->integer('AnswerId')->unsigned();

            $table->foreign('TestId')
                ->references('Id')
                ->on('Tests')
                ->onDelete('cascade');

            $table->foreign('UserId')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('QuestionId')
                ->references('Id')
                ->on('Questions')
                ->onDelete('cascade');

            $table->foreign('AnswerId')
                ->references('Id')
                ->on('Answers')
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
        Schema::dropIfExists('Results');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
