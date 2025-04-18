<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commentary extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'user_id',
        'post_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function meme() {
        return $this->belongsTo(Meme::class);
    }
}
