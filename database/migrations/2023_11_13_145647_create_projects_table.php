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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45);
            $table->mediumText('description')->charset('utf8mb4')->collation('utf8mb4_general_ci');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        Schema::table('tasks', function (Blueprint $table) {
//            // Drop the foreign key only if it exists
//            if (Schema::hasColumn('tasks', 'project_id')) {
//                $table->dropForeign(['project_id']);
//            }
//        });

        Schema::dropIfExists('projects');
    }

};
