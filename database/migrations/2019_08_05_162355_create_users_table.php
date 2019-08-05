<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');


            $table->string('username');
            $table->string('password');

            $table->bigInteger('author_id')->unsigned();

            $table->foreign('author_id')->references('id')->on('users');

            $table->integer('UID');
            $table->integer('forum_id');

            $table->bigInteger('rank_id')->unsigned();
            $table->foreign('rank_id')->references('id')->on('ranks');

            /*

                        $table->integer('time_sHQ');
                        $table->integer('time_hHQ');
                        $table->integer('time_mHQ');

                        $table->integer('time-DZ');
            */
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('users');
        Schema::enableForeignKeyConstraints();
    }
}
