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
        Schema::table('legal_products', function (Blueprint $table) {
            $table->dateTime('assignment_start_date')->after('finish_date')->nullable();
            $table->dateTime('finalization_start_date')->after('finalization_progress')->nullable();
            $table->dateTime('determination_start_date')->after('finalization_finish_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('legal_products', function (Blueprint $table) {
            $table->drop('assignment_start_date');
            $table->drop('finalization_start_date');
            $table->drop('determination_start_date');
        });
    }
};
