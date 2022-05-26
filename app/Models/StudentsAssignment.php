<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentsAssignment extends Model
{
    use HasFactory;
    protected $table = 'students_assignment';
    protected $primaryKey = 'id_student_assign';

    protected $fillable = [
        'group_assign_code',
        'student_id',
        'student_assign_file',
        'student_assign_score'
    ];

    public function Assignment()
    {
        return $this->hasMany('Assignment', 'id_assignment');
    }

    public function Students()
    {
        return $this->hasMany('Students', 'id_student');
    }
}
