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
        Schema::table('carriers', function (Blueprint $table) {
            $table->string('mc_authority_letter')->nullable();
            $table->string('certificate_of_liability_insurance')->nullable();
            $table->string('w9_form')->nullable();
            $table->string('void_cheque')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carriers', function (Blueprint $table) {
            $table->dropColumn('mc_authority_letter');
            $table->dropColumn('certificate_of_liability_insurance');
            $table->dropColumn('w9_form');
            $table->dropColumn('void_cheque');
        });
    }
};
