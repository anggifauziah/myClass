<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileAnnouncement extends Model
{
    use HasFactory;
    protected $table = 'file_announcement';
    protected $primaryKey = 'id_file_announce';
    public $timestamps = false;

    protected $fillable = [
        'announce_id',
        'filename'
    ];

    public function Announcement()
    {
        return $this->hasMany('Announcement', 'id_announce');
    }
}
