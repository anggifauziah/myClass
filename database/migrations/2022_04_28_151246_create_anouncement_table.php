<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnouncementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anouncement', function (Blueprint $table) {
            $table->increments('id_announce');
            $table->integer('post_type_id');
            $table->integer('class_id');
            $table->text('announce_content');
            $table->string('announce_file');
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
        Schema::dropIfExists('anouncement');
    }
}
