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
    Schema::create('carriers', function (Blueprint $table) {
        $table->id();
        // $table->timestamps();
        $table->unsignedBigInteger('user_id');

        // Make all columns nullable
        $table->string('companyName')->nullable();
        $table->string('dba')->nullable();
        $table->string('address')->nullable();
        $table->string('streetAddress')->nullable();
        $table->string('city')->nullable();
        $table->string('state')->nullable();
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->date('dob')->nullable();
        $table->string('mcNumber')->nullable();
        $table->string('usdot')->nullable();
        $table->integer('numTrucks')->nullable();
        $table->integer('numDrivers')->nullable();
        $table->string('equipmentType')->nullable();
        $table->string('PaymentMethod')->nullable();
        $table->string('Route')->nullable();
        $table->text('preferredStates')->nullable();
        // Add more columns as needed for other form fields

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
        Schema::dropIfExists('carriers');
    }
};
