<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('notes')) {
            Schema::create('notes', function (Blueprint $table) {
                $table->bigIncrements('id', true);
                $table->bigInteger('subject_id')->unsigned();
                $table->mediumText('leftColumn');
                $table->mediumText('rightColumn');
                $table->mediumText('bottemColumn');
                $table->string('theme');
                $table->timestamps();
            });

            Schema::table('notes', function($table) {
                $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');;
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
        Schema::dropIfExists('notes');
    }
}
