<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('emptySeating');
            $table->string('price');
            $table->string('hourNumber');
            $table->date('date');
            $table->foreignId('company_id')->constrained();
            $table->unsignedBigInteger('from');
            $table->unsignedBigInteger('to');

            $table->foreign('from')
                 ->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('to')
                 ->references('id')->on('cities')->onDelete('cascade');

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
        Schema::dropIfExists('tickets');
    }
}
