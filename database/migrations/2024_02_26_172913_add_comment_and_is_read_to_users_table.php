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
        Schema::table('users', function (Blueprint $table) {
            $table->text('comment')->nullable();
            $table->boolean('is_read')->default(false);
            $table->decimal('salary_hour', 10, 2)->nullable();
            $table->decimal('salary', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('comment');
            $table->dropColumn('is_read');
            $table->dropColumn('salary_hour');
            $table->dropColumn('salary');
        });
    }
};
