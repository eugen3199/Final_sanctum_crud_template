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
        if ( !Schema::connection('mysql3')->hasTable('departments') ) {
            Schema::connection('mysql3')->create('departments', function (Blueprint $table) {
                $table->id();
                $table->string('deptName');
                $table->string('deptPrefixID');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql2')->hasTable('departments') ) {
            Schema::connection('mysql2')->create('departments', function (Blueprint $table) {
                $table->id();
                $table->string('deptName');
                $table->string('deptPrefixID');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql4')->hasTable('departments') ) {
            Schema::connection('mysql4')->create('departments', function (Blueprint $table) {
                $table->id();
                $table->string('deptName');
                $table->string('deptPrefixID');
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
        Schema::dropIfExists('departments');
    }
};
