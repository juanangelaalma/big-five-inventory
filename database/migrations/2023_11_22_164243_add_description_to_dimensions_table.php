<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('dimensions', function (Blueprint $table) {
            $table->text('low_percentile_description')->after('name')->nullable();
            $table->text('high_percentile_description')->after('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dimensions', function (Blueprint $table) {
            $table->removeColumn('low_percentile_description');
            $table->removeColumn('high_percentile_description');
        });
    }
};
