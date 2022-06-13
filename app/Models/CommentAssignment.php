<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentAssignment extends Model
{
    use HasFactory;
    protected $table = 'comment_assignment';
    protected $primaryKey = 'id_comment_assign';

    protected $fillable = [
        'assign_id',
        'user_id',
        'creator_comment_assign',
        'comment_assign'
    ];

    public function Assignment()
    {
        return $this->hasMany('Assignment', 'id_assign');
    }
}
