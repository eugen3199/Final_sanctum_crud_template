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
        if ( !Schema::connection('mysql2')->hasTable('employees') ) {
            Schema::connection('mysql2')->create('employees', function (Blueprint $table) {
                $table->id();
                $table->string('empCardID');
                $table->string('empName');
                $table->integer('empPosID');
                $table->integer('empDeptID');
                $table->string('empJoinDate');
                $table->string('empNRC');
                $table->string('empPhone');
                $table->string('empEmgcPerson');
                $table->string('empEmgcPhone');
                $table->integer('empCampusID');
                $table->string('empKey');
                $table->boolean('empStatus');
                $table->string('empQR');
                $table->string('empProfileImg');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql3')->hasTable('employees') ) {
            Schema::connection('mysql3')->create('employees', function (Blueprint $table) {
                $table->id();
                $table->string('empCardID');
                $table->string('empName');
                $table->integer('empPosID');
                $table->integer('empDeptID');
                $table->string('empJoinDate');
                $table->string('empNRC');
                $table->string('empPhone');
                $table->string('empEmgcPerson');
                $table->string('empEmgcPhone');
                $table->integer('empCampusID');
                $table->string('empKey');
                $table->boolean('empStatus');
                $table->string('empQR');
                $table->string('empProfileImg');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql4')->hasTable('employees') ) {
            Schema::connection('mysql4')->create('employees', function (Blueprint $table) {
                $table->id();
                $table->string('empCardID');
                $table->string('empName');
                $table->integer('empPosID');
                $table->integer('empDeptID');
                $table->string('empJoinDate');
                $table->string('empNRC');
                $table->string('empPhone');
                $table->string('empEmgcPerson');
                $table->string('empEmgcPhone');
                $table->integer('empCampusID');
                $table->string('empKey');
                $table->boolean('empStatus');
                $table->string('empQR');
                $table->string('empProfileImg');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
