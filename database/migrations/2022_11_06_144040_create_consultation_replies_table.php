<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultation_replies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checker_id')
                    ->nullable()
                    ->constrained('users')
                    ->onDelete('set null');  
            $table->text('content');
            $table->text('meeting_url')->nullable();
            $table->text('attachment')->nullable();
            $table->string('status')->comment('0=>rejected,1=>submitted,2=>approved');
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('consultation_replies');
    }
}
