<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('group')) {
            Schema::create('group', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('count')->unsigned()->default(0);
            });
        }

        if (!Schema::hasTable('algorithm')) {
            Schema::create('algorithm', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('code');
                $table->integer('group_id')->unsigned();
                $table->foreign('group_id')->references('id')->on('group');
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
        // delete constraints
        Schema::table('algorithm', function (Blueprint $table) {
            $table->dropForeign('algorithm_group_id_foreign');
        });

        Schema::dropIfExists('group');
        Schema::dropIfExists('algorithm');
    }
}
