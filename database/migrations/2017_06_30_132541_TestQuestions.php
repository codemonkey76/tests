<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TestQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TestQuestions', function (Blueprint $table) {
            $table->integer('TestId')->unsigned();
            $table->integer('QuestionId')->unsigned();

            $table->primary(['TestId','QuestionId']);
            
            $table->foreign('QuestionId')
                ->references('Id')
                ->on('Questions')
                ->onDelete('cascade');
            
            $table->foreign('TestId')
                ->references('Id')
                ->on('Tests')
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
        Schema::dropIfExists('TestQuestions');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
