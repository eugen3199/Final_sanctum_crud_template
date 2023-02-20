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
        if ( !Schema::connection('mysql3')->hasTable('positions') ) {
            Schema::connection('mysql3')->create('positions', function (Blueprint $table) {
                $table->id();
                $table->string('posName');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql2')->hasTable('positions') ) {
            Schema::connection('mysql2')->create('positions', function (Blueprint $table) {
                $table->id();
                $table->string('posName');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql4')->hasTable('positions') ) {
            Schema::connection('mysql4')->create('positions', function (Blueprint $table) {
                $table->id();
                $table->string('posName');
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
        Schema::dropIfExists('positions');
    }
};
