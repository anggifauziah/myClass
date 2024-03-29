<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $primaryKey = 'id_student';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'student_name',
        'student_gender',
        'student_birthOfdate'
    ];

    public function User()
    {
        return $this->belongsTo('User', 'id');
    }
}
