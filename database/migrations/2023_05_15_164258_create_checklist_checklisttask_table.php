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
        Schema::create('checklist_checklisttask', function (Blueprint $table) {
            $table->foreignId('checklist_id')->constrained();
            $table->foreignId('checklisttask_id')->constrained();
            $table->boolean('status')->default(0);
            $table->primary(['checklist_id', 'checklisttask_id']);
            $table->timestamp('done_at')->nullable();
            $table->string('user_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checklist_checklisttask');
    }
};
