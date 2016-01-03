<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('title');
            $table->string('secondary');
            $table->string('title_for_universities');
            $table->string('secondary_text_for_universities');
            $table->text('programs');
            $table->text('three_steps');
            $table->char('lang', 4);
            $table->integer('status')->default(1);
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
        //
    }
}
