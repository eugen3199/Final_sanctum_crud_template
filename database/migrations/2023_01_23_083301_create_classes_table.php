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
        if ( !Schema::connection('mysql3')->hasTable('classes') ) {
            Schema::connection('mysql3')->create('classes', function (Blueprint $table) {
                $table->id();
                $table->string('className');
                $table->string('classPrefixID');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql2')->hasTable('classes') ) {
            Schema::connection('mysql2')->create('classes', function (Blueprint $table) {
                $table->id();
                $table->string('className');
                $table->string('classPrefixID');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql4')->hasTable('classes') ) {
            Schema::connection('mysql4')->create('classes', function (Blueprint $table) {
                $table->id();
                $table->string('className');
                $table->string('classPrefixID');
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
        Schema::dropIfExists('classes');
    }
};
