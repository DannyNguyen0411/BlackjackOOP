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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task', 200);
            $table->dateTime('begin_date');
            $table->dateTime('end_date')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()
            ->onUpdate('no action')->onDelete('no action');
            $table->foreignId('project_id')->constrained()
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('status_id')->constrained()
                ->onUpdate('required')->onDelete('required');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
