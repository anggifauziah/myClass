<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassOfStudents extends Model
{
    use HasFactory;
    protected $table = 'class_of_students';
    protected $primaryKey = 'id_classOfStudents';

    protected $fillable = [
        'class_id',
        'student_id',
    ];

    public function Classes()
    {
        return $this->hasMany('Classes', 'id_class');
    }

    public function Students()
    {
        return $this->hasMany('Students', 'id_student');
    }
}
