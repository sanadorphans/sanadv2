<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consultant_id')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null');
            $table->text('title');
            $table->longText('content');
            $table->text('attachment')->nullable();    
            $table->string('status')->comment('0=>closed,1=>submitted,2=>assigned to consultant,2=>waiting for reply,3=>replied');
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
        Schema::dropIfExists('consultations');
    }
}
