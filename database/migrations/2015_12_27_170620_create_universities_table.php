<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('sort_id');
            $table->string('slug');
            $table->string('title');
            $table->string('image');
            $table->string('meta_title');
            $table->mediumText('meta_description');
            $table->string('map');
            $table->text('text');
            $table->char('lang', 4);
            $table->tinyInteger('status');
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
