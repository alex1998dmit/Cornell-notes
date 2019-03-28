<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoteUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('note_user')) {
            Schema::create('note_user', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('user_id');
                $table->bigInteger('note_id');
                $table->timestamps();

                $table->primary(['user_id', 'note_id']);
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
        Schema::dropIfExists('user_note');
    }
}
