<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_code',
        'class_name',
        'class_subject',
        'class_desc',
        'class_room'
    ];

    public function Teacher()
    {
        return $this->belongsTo('Teacher', 'id_teacher');
    }
}
