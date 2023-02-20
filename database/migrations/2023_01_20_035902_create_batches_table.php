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
        if ( !Schema::connection('mysql3')->hasTable('batches') ) {
            Schema::connection('mysql3')->create('batches', function (Blueprint $table) {
                $table->id();
                $table->string('batchName');
                $table->string('batchClassID');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql2')->hasTable('batches') ) {
            Schema::connection('mysql2')->create('batches', function (Blueprint $table) {
                $table->id();
                $table->string('batchName');
                $table->string('batchClassID');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql4')->hasTable('batches') ) {
            Schema::connection('mysql4')->create('batches', function (Blueprint $table) {
                $table->id();
                $table->string('batchName');
                $table->string('batchClassID');
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
        Schema::dropIfExists('batches');
    }
};
