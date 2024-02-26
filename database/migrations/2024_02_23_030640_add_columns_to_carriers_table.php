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
            $table->enum('status', ['active', 'pending', 'rejected'])->default('pending');

            // Column for approve/unapprove
            $table->boolean('approved')->default(false);

            // Column for assigned/unassigned
            $table->boolean('assigned')->default(false);
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
            $table->dropColumn(['status', 'approved', 'assigned']);
        });
    }
};
