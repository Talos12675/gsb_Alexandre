<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('activite_compl', function (Blueprint $table) {
            $table->increments('AC_NUM');
            $table->dateTime('AC_DATE');
            $table->string('AC_LIEU', 25);
            $table->string('AC_THEME', 10);
            $table->string('AC_MOTIF', 50);
        });

    }

    public function down()
    {
        Schema::dropIfExists('activite_compl');
    }
};
