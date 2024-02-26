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
        Schema::create('loads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->string('load')->nullable();
            $table->string('carrier')->nullable();
            $table->string('name')->nullable();
            $table->date('date')->nullable();
            $table->string('broker')->nullable();
            $table->string('trip')->nullable();
            $table->string('amount')->nullable();
            $table->date('pudate')->nullable();
            $table->date('origindeldate')->nullable();
            $table->string('destination')->nullable();
            $table->string('jobstatus')->nullable();
            $table->string('ratepermile')->nullable();
            $table->string('agreement')->nullable();
            $table->string('dispatcher')->nullable();
            $table->string('profit')->nullable();
            $table->string('paid')->nullable();
            $table->string('remainingbalance')->nullable();
            $table->string('invoicestatus')->nullable();
            $table->string('srno')->nullable();
            $table->string('agentname')->nullable();
            $table->string('companyname')->nullable();
            $table->string('mc')->nullable();
            $table->string('driverstruck')->nullable();
            $table->string('trucksstate')->nullable();
            $table->string('contact')->nullable();
            $table->timestamps();
            
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loads');
    }
};
