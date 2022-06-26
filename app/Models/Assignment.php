<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $table = 'assignment';
    protected $primaryKey = 'id_assign';

    protected $fillable = [
        'class_id',
        'user_id',
        'creator_name',
        'assign_title',
        'assign_content',
        'assign_deadline'
    ];

    public function Classes()
    {
        return $this->hasMany('Classes', 'id_class');
    }

    public function User()
    {
        return $this->belongsToMany('User', 'id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
