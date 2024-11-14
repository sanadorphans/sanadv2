<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('consultations', function (Blueprint $table) {
            //
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('consultation_categories')
                ->onDelete('set null');
            $table->timestamp("admin_approved_at")->nullable();
            $table->timestamp("admin_rejected_at")->nullable();
            $table->text("admin_rejection_comment")->nullable();    
            $table->timestamp("consultant_approved_at")->nullable();
            $table->timestamp("consultant_rejected_at")->nullable();
            $table->text("consultant_rejection_comment")->nullable();     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('consultations', function (Blueprint $table) {
            //
        });
    }
}
