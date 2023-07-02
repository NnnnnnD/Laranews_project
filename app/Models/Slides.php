<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    use HasFactory;
    protected $table ='slides';

    protected $fillable = [
        'judul_slide', 'link', 'gambar_slide', 'status'
    ];
    protected $hidden= [];
}