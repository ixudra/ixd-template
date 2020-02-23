<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

    public function up()
    {
        Schema::create('users', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('first_name', 128)->nullable()->default(null);
            $table->string('last_name', 128)->nullable()->default(null);
            $table->string('email', 128)->unique();
            $table->string('password', 64)->nullable()->default(null);
            $table->boolean('active')->nullable()->default(false);
            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::drop('users');
    }

}
