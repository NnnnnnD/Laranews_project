<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reply;


class Komentar extends Model
{
    use HasFactory;
    protected $table = 'komentar';
    protected $fillable = [
        'artikel_id',
        'user_id',
        'content',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
public function replies()
{
    return $this->hasMany(Reply::class);
}
}