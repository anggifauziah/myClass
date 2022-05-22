<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table = 'announcement';
    protected $primaryKey = 'id_announce';

    protected $fillable = [
        'post_type_id',
        'class_id',
        'announce_content',
        'announce_file'
    ];

    public function Classes()
    {
        return $this->hasMany('Classes', 'id_class');
    }

    public function PostType()
    {
        return $this->hasMany('PostType', 'id_post_type');
    }
}
