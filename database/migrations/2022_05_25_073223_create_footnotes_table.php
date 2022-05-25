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
        Schema::create('footnotes', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignUuid('review_version_id')->constrained('review_versions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('finalization_id')->constrained('finalizations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUuid('determination_id')->constrained('determinations')->onUpdate('cascade')->onDelete('cascade');
            $table->string('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footnotes');
    }
};
