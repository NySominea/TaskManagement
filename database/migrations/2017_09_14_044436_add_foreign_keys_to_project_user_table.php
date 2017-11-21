<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToProjectUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('project_user', function (Blueprint $table) {
//
//            $table->foreign('user_id')
//                ->references('id')->on('users')
//                ->onDelete('cascade');
//            $table->foreign('project_id')
//                ->references('id')->on('projects')
//                ->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_user_user_id_foreign');
        Schema::dropIfExists('project_user_project_id_foreign');
    }
}
