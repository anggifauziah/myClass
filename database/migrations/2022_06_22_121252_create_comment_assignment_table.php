<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_assignment', function (Blueprint $table) {
            $table->increments('id_comment_assign');
            $table->integer('assign_id');
            $table->integer('user_id');
            $table->string('creator_comment_assign');
            $table->text('comment_assign');
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
        Schema::dropIfExists('comment_assignment');
    }
}
