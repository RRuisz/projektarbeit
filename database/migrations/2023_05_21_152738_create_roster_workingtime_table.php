<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roster_workingtime', function (Blueprint $table) {
            $table->foreignId('roster_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('workingtime_id')->constrained();
            $table->foreignId('weekday_id')->constrained();
            $table->primary(['roster_id', 'user_id', 'workingtime_id', 'weekday_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roster_workingtime');
    }
};
