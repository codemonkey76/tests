<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Answers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Answers', function (Blueprint $table) {
            $table->increments('Id');
            $table->integer('QuestionId')->unsigned();
            $table->string('Answer');

            $table->foreign('QuestionId')
                ->references('Id')
                ->on('Questions')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::table('Questions', function($table) {
        $table->foreign('AnswerId')
            ->references('Id')
            ->on('Answers')
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
        Schema::dropIfExists('Answers');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
