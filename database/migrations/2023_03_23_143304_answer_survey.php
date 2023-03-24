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
        Schema::create('answer_survey', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('answer_id');
            $table->unsignedBigInteger('survey_id');
            $table->foreign('answer_id')->references('id')->on('answers');
            $table->foreign('survey_id')->references('id')->on('surveys');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_survey');
    }
};
