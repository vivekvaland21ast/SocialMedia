<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $fillable = ['post_caption', 'post_image', 'user_id'];
    protected $table = 'posts';

    public function user()
    {
        return $this->belongsTo(Profiles::class);
    }
}
