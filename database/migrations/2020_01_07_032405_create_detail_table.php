<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Detail', function (Blueprint $table) {
            $table->increments('id');
            $table->text('company');
            $table->text('poundlist');
            $table->text('outdate');
            $table->text('carnum');
            $table->text('product');
            $table->text('package');
            $table->float('weight');
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
        Schema::dropIfExists('Detail');
    }
}
