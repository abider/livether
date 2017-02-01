<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->string('id');
            $table->integer('roomid');
            $table->string('author');
            $table->string('title');
            $table->string('category');
            $table->string('cate');
            $table->string('avatar');
            $table->integer('looker')->index();
            $table->string('thumb');
            $table->string('jump_url');
            $table->string('live_url');
            $table->string('iid')->unique();
            $table->primary('id');
            $table->unique('id');
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
        Schema::dropIfExists('rooms');
    }
}
