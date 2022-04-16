<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('developer_id');
            $table->integer('status_id')->default(1);
            $table->string('project_code')->unique();
            $table->string('project_name');
            $table->string('client_name');
            $table->date('project_start');
            $table->date('project_finish');
            $table->string('target')->default(100);
            $table->string('price');
            $table->string('pj');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
