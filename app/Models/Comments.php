<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $primaryKey = 'id_comment';

    protected $fillable = [
        'post_type_id',
        'user_id',
        'parent_id',
        'comment'
    ];

    public function Assignment()
    {
        return $this->hasMany('Assignment', 'id_assignment');
    }

    public function Announcement()
    {
        return $this->hasMany('Announcement', 'id_announce');
    }
}
