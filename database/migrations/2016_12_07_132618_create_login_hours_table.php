<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_hours', function (Blueprint $table) {
          $table->increments('id');
          $table->string('hours');
          // user relation
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')
          ->references('id')->on('users')
          ->onUpdate('cascade')->onDelete('cascade');
          // user relation
          // log relation
          $table->integer('log_id')->unsigned();
          $table->foreign('log_id')
          ->references('id')->on('entrance_logs')
          ->onUpdate('cascade')->onDelete('cascade');
          // log relation
          $table->timestamp('created_at')->useCurrent();
          $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('login_hours');
    }
}
