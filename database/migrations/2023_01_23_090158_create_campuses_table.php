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
        if ( !Schema::connection('mysql3')->hasTable('campuses') ) {
            Schema::connection('mysql3')->create('campuses', function (Blueprint $table) {
                $table->id();
                $table->string('CampusName');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql2')->hasTable('campuses') ) {
            Schema::connection('mysql2')->create('campuses', function (Blueprint $table) {
                $table->id();
                $table->string('CampusName');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql4')->hasTable('campuses') ) {
            Schema::connection('mysql4')->create('campuses', function (Blueprint $table) {
                $table->id();
                $table->string('CampusName');
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
        Schema::dropIfExists('campuses');
    }
};
