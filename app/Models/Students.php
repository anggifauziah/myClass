<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'id_student';

    protected $fillable = [
        'user_id',
        'student_name',
        'student_gender',
        'student_birthOfdate',
        'student_photo'
    ];

    public function User()
    {
        return $this->belongsTo('User', 'id');
    }
}
