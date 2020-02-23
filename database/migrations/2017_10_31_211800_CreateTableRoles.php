<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRoles extends Migration {

    public function up()
    {
        Schema::create('roles', function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('key', 128)->nullable()->default(null);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_roles', function (Blueprint $table)
        {
            $table->integer('user_id');
            $table->integer('role_id');
            $table->primary(array('user_id', 'role_id'));
        });
    }

    public function down()
    {
        Schema::drop('roles');
        Schema::drop('user_roles');
    }

}
