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
        Schema::connection('mysql')->create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('className');
            $table->string('classPrefixID');
            $table->timestamps();
        });

        Schema::connection('mysql2')->create('classes', function (Blueprint $table) {
            $table->id();
            $table->string('className');
            $table->string('classPrefixID');
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
        Schema::dropIfExists('classes');
    }
};
