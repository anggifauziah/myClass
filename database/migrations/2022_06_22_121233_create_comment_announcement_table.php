<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentAnnouncementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_announcement', function (Blueprint $table) {
            $table->increments('id_comment_announce');
            $table->integer('announce_id');
            $table->integer('user_id');
            $table->string('creator_comment_announce');
            $table->text('comment_announce');
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
        Schema::dropIfExists('comment_announcement');
    }
}
