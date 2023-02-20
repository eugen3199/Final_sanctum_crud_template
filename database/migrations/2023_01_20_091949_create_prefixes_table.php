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
        if ( !Schema::connection('mysql3')->hasTable('prefixes') ) {
            Schema::connection('mysql3')->create('prefixes', function (Blueprint $table) {
                $table->id();
                $table->string('prefixName');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql2')->hasTable('prefixes') ) {
            Schema::connection('mysql2')->create('prefixes', function (Blueprint $table) {
                $table->id();
                $table->string('prefixName');
                $table->timestamps();
            });
        }

        if ( !Schema::connection('mysql4')->hasTable('prefixes') ) {
            Schema::connection('mysql4')->create('prefixes', function (Blueprint $table) {
                $table->id();
                $table->string('prefixName');
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
        Schema::dropIfExists('prefixes');
    }
};
