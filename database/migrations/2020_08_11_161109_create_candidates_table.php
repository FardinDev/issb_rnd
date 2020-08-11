<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('sex')->nullable();
            $table->string('present_address')->nullable();
            $table->string('present_division')->nullable();
            $table->string('present_district')->nullable();
            $table->string('parmanent_address')->nullable();
            $table->string('parmanent_division')->nullable();
            $table->string('parmanent_district')->nullable();
            $table->string('dob')->nullable();
            $table->string('age')->nullable();
            $table->double('height_in_meter', 8, 2)->nullable();
            $table->double('weight_in_kg', 8, 2)->nullable();
            $table->string('built')->nullable();
            $table->string('complexion')->nullable();
            $table->string('present_occupation')->nullable();
            $table->integer('monthly_income')->nullable()->default(0);
            $table->string('maritaial_status')->nullable();
            $table->string('religion')->nullable();
            $table->string('caste_or_tribe')->nullable();
            $table->string('mother_tounge')->nullable();
            $table->string('hobby')->nullable();
            $table->boolean('visit_abroad')->default(0);
            $table->boolean('physical_or_mental_disease')->default(0);
            $table->string('preparation_of_issb')->nullable();
            $table->string('previous_result_in_issb')->nullable();
            $table->string('break_of_study')->nullable();
            $table->string('name_of_school')->nullable();
            $table->string('name_of_college')->nullable();
            $table->string('name_of_last_college_or_university')->nullable();
            $table->string('standard_of_college_or_university')->nullable();
            $table->string('accademic_qualification')->nullable();
            $table->string('year_of_passing')->nullable();
            $table->string('standard_of_academic_attainments')->nullable();
            $table->string('HSC')->nullable();
            $table->string('graduate')->nullable();
            $table->string('masters')->nullable();
            $table->string('name_of_present_organization')->nullable();
            $table->string('extra_curricular_activities')->nullable();

            $table->string('father_name')->nullable();
            $table->string('father_educational_qualification')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('father_professional_status')->nullable();
            $table->integer('father_average_monthly_income')->nullable()->default(0);
            $table->string('father_last_professional_status')->nullable();

            $table->string('mother_name')->nullable();
            $table->string('mother_educational_qualification')->nullable();
            $table->string('mother_profession')->nullable();
            $table->string('mother_professional_status')->nullable();
            $table->integer('mother_average_monthly_income')->nullable()->default(0);
            $table->string('mother_last_professional_status')->nullable();

            $table->string('parental_relation_status')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('relation_with_guardian')->nullable();
            $table->string('guardian_profession')->nullable();
            $table->string('guardian_professional_status')->nullable();
            $table->integer('guardian_average_monthly_income')->nullable()->default(0);

            $table->integer('family_monthly_income')->nullable()->default(0);

            $table->integer('number_of_brother')->nullable()->default(0);
            $table->integer('number_of_sister')->nullable()->default(0);
            $table->integer('number_of_step_brother')->nullable()->default(0);
            $table->integer('number_of_step_sister')->nullable()->default(0);
            $table->integer('total_number_of_sibling')->nullable()->default(0);
            $table->integer('sibling_order')->nullable()->default(0);
            $table->string('social-status_of_family')->nullable();

            

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
        Schema::dropIfExists('candidates');
    }
}
