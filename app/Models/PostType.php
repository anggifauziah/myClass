<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    use HasFactory;
    protected $table = 'post_type';
    protected $primaryKey = 'id_post_type';

    protected $fillable = [
        'post_type'
    ];

    public function Announcement()
    {
        return $this->hasMany('Announcement', 'id_announcement');
    }
}
