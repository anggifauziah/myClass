<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileAssignment extends Model
{
    use HasFactory;
    protected $table = 'file_assignment';
    protected $primaryKey = 'id_file_assign';
    public $timestamps = false;

    protected $fillable = [
        'assign_id',
        'filename'
    ];

    public function Assignment()
    {
        return $this->hasMany('Assignment', 'id_assign');
    }
}
