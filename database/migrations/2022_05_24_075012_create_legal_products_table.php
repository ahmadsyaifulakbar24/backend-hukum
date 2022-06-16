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
        Schema::create('legal_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('created_by')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('service_category_id')->constrained('service_categories')->onUpdate('cascade');
            $table->string('title');
            $table->foreignUuid('mandate_id')->nullable()->constrained('params')->onUpdate('cascade');
            $table->dateTime('completion_target');
            $table->integer('progress')->default(0);
            $table->enum('status', ['pending', 'process', 'finish', 'canceled'])->default('pending');
            $table->dateTime('finish_date')->nullable();
            $table->integer('finalization_progress')->default(0);
            $table->dateTime('finalization_finish_date')->nullable();
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
        Schema::dropIfExists('legal_products');
    }
};
