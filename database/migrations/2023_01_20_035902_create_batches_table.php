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
        Schema::connection('mysql3')->create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('batchName');
            $table->string('batchClassID');
            $table->timestamps();
        });

        Schema::connection('mysql2')->create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('batchName');
            $table->string('batchClassID');
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
        Schema::dropIfExists('batches');
    }
};
