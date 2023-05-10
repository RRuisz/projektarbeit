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
        Schema::create('engineeringtask_taskcomment', function (Blueprint $table) {
            $table->foreignId('engineeringtask_id')->constrained();
            $table->foreignId('taskcomment_id')->constrained();
            $table->primary(['engineeringtask_id', 'taskcomment_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('engineeringtask_taskcomment');
    }
};
