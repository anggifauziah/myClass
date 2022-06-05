<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileStudentsAssignment extends Model
{
    use HasFactory;
    protected $table = 'file_students_assignment';
    protected $primaryKey = 'id_file_student_assign';
    public $timestamps = false;

    protected $fillable = [
        'student_assign_id',
        'filename_student_assign'
    ];

    public function StudentsAssignment()
    {
        return $this->hasMany('StudentsAssignment', 'id_student_assign');
    }
}
