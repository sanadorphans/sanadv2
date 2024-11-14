<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrphanagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orphanages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->nullable();
            $table->string('license number');
            $table->string('mobile');
            $table->string('phone');
            $table->string('country');
            $table->string('governorate');
            $table->string('email');
            $table->text('children_no')->nullable();
            $table->text('schools_type')->nullable();
            $table->text('Universities_names_with_colleges')->nullable();
            $table->boolean('first_aid_kit')->nullable();
            $table->boolean('medical_drugs')->nullable();
            $table->text('medical_drugs_clarifications')->nullable();
            $table->boolean('medical_operations')->nullable();
            $table->text('medical_operations_clarifications')->nullable();
            $table->boolean('medical_tests')->nullable();
            $table->text('medical_tests_clarifications')->nullable();
            $table->boolean('marriage_needs')->nullable();
            $table->text('marriage_needs_clarifications')->nullable();
            $table->boolean('job_needs')->nullable();
            $table->text('job_needs_clarifications')->nullable();
            $table->boolean('construction_needs')->nullable();
            $table->text('construction_needs_clarifications')->nullable();
            $table->boolean('furniture_needs')->nullable();
            $table->text('furniture_needs_clarifications')->nullable();
            $table->boolean('toys_needs')->nullable();
            $table->text('toys_needs_clarifications')->nullable();
            $table->boolean('library')->nullable();
            $table->boolean('kitchen_needs')->nullable();
            $table->text('kitchen_needs_clarifications')->nullable();
            $table->boolean('computers_needs')->nullable();
            $table->text('computers_needs_clarifications')->nullable();
            $table->boolean('clothes_needs')->nullable();
            $table->text('clothes_needs_clarifications')->nullable();
            $table->text('more_needs')->nullable();


            $table->string('name_orphanage')->nullable();
            $table->string('intro_no')->nullable();
            $table->string('followed_management')->nullable();
            $table->string('orphanage_type')->nullable();
            $table->string('ceo_name')->nullable();
            $table->string('ceo_job')->nullable();
            $table->string('manager_name')->nullable();
            $table->string('phone_orphanage')->nullable();
            $table->boolean('prev_coop')->nullable();
            $table->string('coop_type')->nullable();
            $table->integer('buildings_no')->nullable();
            $table->integer('bedrooms_no')->nullable();
            $table->integer('activity_rooms_no')->nullable();
            $table->integer('management_rooms_no')->nullable();
            $table->boolean('storage_room')->nullable();
            $table->boolean('food_room')->nullable();
            $table->integer('girls_no_2')->nullable();
            $table->integer('girls_no_2_5')->nullable();
            $table->integer('girls_no_6_9')->nullable();
            $table->integer('girls_no_10_13')->nullable();
            $table->integer('girls_no_14_18')->nullable();
            $table->integer('girls_no_19_24')->nullable();

            $table->integer('boys_no_2')->nullable();
            $table->integer('boys_no_2_5')->nullable();
            $table->integer('boys_no_6_9')->nullable();
            $table->integer('boys_no_10_13')->nullable();
            $table->integer('boys_no_14_18')->nullable();
            $table->integer('boys_no_19_24')->nullable();

            $table->integer('millitary_service')->nullable();
            $table->integer('divorce_no')->nullable();
            $table->text('divorce_treatment')->nullable();

            $table->integer('post_care_specialists_no')->nullable();
            $table->integer('protection_specialists_no')->nullable();
            $table->integer('night_supervisors_no')->nullable();
            $table->integer('male_supervisors_no')->nullable();
            $table->integer('female_supervisors_no')->nullable();
            $table->integer('surrogate_mothers_no')->nullable();
            $table->integer('social_workers_no')->nullable();

            $table->integer('psychologists_no')->nullable();

            $table->integer('education_specialists_no')->nullable();
            $table->integer('activity_specialists_no')->nullable();
            $table->integer('nutrition_specialists_no')->nullable();
            $table->integer('doctors_no')->nullable();
            $table->integer('nurses_no')->nullable();

            $table->integer('workers_no')->nullable();
            $table->integer('cooks_no')->nullable();
            $table->integer('accountants_no')->nullable();
            $table->integer('hygiene_officers_no')->nullable();
            $table->integer('security_no')->nullable();
            $table->integer('total_employees_no')->nullable();
            $table->boolean('children_equal_beds_no')->nullable();
            $table->integer('youth_rooms_no')->nullable();
            $table->integer('youth_no_per_room')->nullable();
            $table->boolean('doors_for_rooms')->nullable();
            $table->boolean('ventilation_source_for_rooms')->nullable();
            $table->boolean('care_givers_rooms')->nullable();
            $table->boolean('visitors_rooms')->nullable();
            $table->boolean('toilets_maintainance_needs')->nullable();
            $table->boolean('children_isolated_from _care_givers_toilets')->nullable();
            $table->boolean('post_care_youth_building')->nullable();
            $table->integer('no_of_toilets')->nullable();
            $table->integer('fire_extinguishers_no')->nullable();



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
        Schema::dropIfExists('orphanages');
    }
}
