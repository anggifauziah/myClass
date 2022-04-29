<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsAssignmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_assignment', function (Blueprint $table) {
            $table->increments('id_student_assign');
            $table->integer('student_assign_id');
            $table->integer('student_id');
            $table->string('student_assign_file');
            $table->string('student_assign_score');
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
        Schema::dropIfExists('students_assignment');
    }
}
