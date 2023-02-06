<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql3')->create('students', function (Blueprint $table) {
            $table->id();
            $table->string('studCardID');
            $table->string('studName');
            $table->string('studClassID');
            $table->string('studBatchID');
            $table->string('studGuardName');
            $table->string('studDoB');
            $table->string('studEmgcPhone1');
            $table->string('studEmgcPhone2');
            $table->string('SchoolEmgcCall');
            $table->string('studKey');
            $table->boolean('studStatus');
            $table->timestamps();
        });

        Schema::connection('mysql2')->create('students', function (Blueprint $table) {
            $table->id();
            $table->string('studCardID');
            $table->string('studName');
            $table->string('studClassID');
            $table->string('studBatchID');
            $table->string('studGuardName');
            $table->string('studDoB');
            $table->string('studEmgcPhone1');
            $table->string('studEmgcPhone2');
            $table->string('SchoolEmgcCall');
            $table->string('studKey');
            $table->boolean('studStatus');
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
        Schema::dropIfExists('students');
    }
};
