<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandHistoryTable extends Migration {

    public function up()
    {
        Schema::create('command_history', function (Blueprint $table) {
            $table->increments('id');
            $table->string('command', 256);
            $table->dateTime('start_time');
            $table->timestamp('end_time');
            $table->boolean('is_successful');
        });
    }

    public function down()
    {
        Schema::drop('command_history');
    }

}
