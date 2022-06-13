<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentAnnouncement extends Model
{
    use HasFactory;
    protected $table = 'comment_announcement';
    protected $primaryKey = 'id_comment_announce';

    protected $fillable = [
        'announce_id',
        'user_id',
        'creator_comment_announce',
        'comment_announce'
    ];

    public function Announcement()
    {
        return $this->hasMany('Announcement', 'id_announce');
    }
}
