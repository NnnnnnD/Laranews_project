<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $table = 'balasan_komentar';
    protected $fillable = [
        'komentar_id',
        'user_id',
        'content',
    ];
}
