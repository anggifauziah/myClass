<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $primaryKey = 'id_teacher';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'teacher_name',
        'teacher_gender',
        'teacher_birthOfdate'
    ];

    public function Classes()
    {
        return $this->hasMany('Classes', 'id_class');
    }

    public function User()
    {
        return $this->belongsTo('User', 'id');
    }
}
