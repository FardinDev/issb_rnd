<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssbDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issb_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('candidate_id');
            $table->foreign('candidate_id')->references('id')->on('candidates');
            $table->integer('board_no')->nullable();
            $table->integer('chest_no')->nullable();
            $table->string('roll_no')->nullable();
            $table->string('id_no')->nullable();
            $table->string('batch')->nullable();
            $table->string('course')->nullable();
            $table->string('psy_bpq')->nullable();
            $table->string('psy_tpq')->nullable();
            $table->string('gto_bpq')->nullable();
            $table->string('gto_tpq')->nullable();
            $table->string('dp_bpq')->nullable();
            $table->string('dp_tpq')->nullable();
            $table->string('board_tpq')->nullable();
            $table->string('profile_marks')->nullable();
            $table->string('psy_initial_grades')->nullable();
            $table->string('gto_initial_grades')->nullable();
            $table->string('dp_initial_grades')->nullable();
            $table->string('board_grades_bg')->nullable();
            $table->string('board_and_initial_grades_level')->nullable();
            $table->string('type_of_case')->nullable();
            $table->string('ops')->nullable();
            $table->string('special_remarks')->nullable();
            $table->string('migrated_from_original_course')->nullable();
            $table->string('remarks')->nullable();
            $table->string('psy_name')->nullable();
            $table->string('gto_name')->nullable();
            $table->string('dp_name')->nullable();
            $table->string('president_name')->nullable();
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
        Schema::dropIfExists('issb_data');
    }
}
