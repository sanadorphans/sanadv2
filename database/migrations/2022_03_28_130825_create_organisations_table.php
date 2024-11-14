<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->text('field');
            $table->year('year');
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->text('address')->nullable();
            $table->string('governorate');
            $table->string('country');
            $table->string('communication_way')->nullable();
            $table->integer('employees_no');
            $table->text('geo');
            $table->string('point_of_contact_name');
            $table->string('point_of_contact_position');
            $table->string('point_of_contact_email')->nullable();
            $table->string('point_of_contact_phone')->nullable();
            $table->text('about_wataneya')->nullable();
          
            $table->foreignId('user_id')
                    ->constrained()
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
        Schema::dropIfExists('organisations');
    }
}
