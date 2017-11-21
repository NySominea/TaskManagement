<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('tasks', function (Blueprint $table) {
//            $table->foreign('module_id')
//                ->references('id')->on('modules')
//                ->onDelete('cascade');
//
//            $table->foreign('user_id')
//                ->references('id')->on('users')
//                ->onDelete('cascade');
//
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks_module_id_foreign');
        Schema::dropIfExists('tasks_user_id_foreign');
    }
}
