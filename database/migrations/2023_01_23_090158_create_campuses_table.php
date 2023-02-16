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
        Schema::connection('mysql3')->create('campuses', function (Blueprint $table) {
            $table->id();
            $table->string('CampusName');
            $table->timestamps();
        });

        Schema::connection('mysql2')->create('campuses', function (Blueprint $table) {
            $table->id();
            $table->string('CampusName');
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
        Schema::dropIfExists('campuses');
    }
};
