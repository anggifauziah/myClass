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
        'class_id',
        'user_id',
        'creator_name',
        'announce_content',
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
