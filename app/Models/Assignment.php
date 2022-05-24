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
        'post_type_id',
        'class_id',
        'user_id',
        'creator_name',
        'group_assign_code',
        'assign_title',
        'assign_content',
        'assign_file',
        'assign_deadline'
    ];

    public function Classes()
    {
        return $this->hasMany('Classes', 'id_class');
    }

    public function PostType()
    {
        return $this->belongsTo('PostType', 'id_post_type');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
