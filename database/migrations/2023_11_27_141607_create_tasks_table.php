<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('task', 200);
            $table->date('begindate');
            $table->date('enddate')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('no action')->onUpdate('no action');
            $table->foreignId('project_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('activity_id')->constrained()->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
//        // Manually drop foreign key constraint
//        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
//        Schema::table('tasks', function (Blueprint $table) {
//            $table->dropForeign(['project_id']);
//        });
//        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
//
//        // Drop the table
        Schema::dropIfExists('tasks');
    }
};
