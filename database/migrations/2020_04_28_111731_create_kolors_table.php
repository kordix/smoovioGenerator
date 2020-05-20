<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKolorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kolors', function (Blueprint $table) {
            $table->id();
            $table->string('kod');
            $table->string('opis');
            $table->string('bazakod');
            $table->string('bazaopis');
            $table->string('doplata');
            $table->string('standard');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kolors');
    }
}
