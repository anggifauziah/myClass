<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_name',
        'teacher_gender',
        'teacher_birthOfdate'
    ];

    public function Classes()
    {
        return $this->hasMany('Classes', 'id_class');
    }
}
