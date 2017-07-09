<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompletedTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completed_tests', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('test_id')->unsigned();
            $table->integer('test_results_id')->unsigned();
            $table->integer('correct')->unsigned();
            $table->integer('incorrect')->unsigned();

            $table->primary(['user_id','test_id']);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('test_id')
                ->references('id')
                ->on('tests')
                ->onDelete('cascade');

            $table->foreign('test_results_id')
                ->references('id')
                ->on('test_results')
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
        Schema::dropIfExists('completed_tests');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
