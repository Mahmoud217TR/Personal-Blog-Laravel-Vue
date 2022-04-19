<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maize\Markable\Markable;
use Maize\Markable\Models\Like;

class Comment extends Model
{
    use HasFactory, Markable;

    protected $fillable = [
        'user_id',
        'post_id',
        'content',
    ];

    protected static $marks = [
        Like::class,
    ];

    public function user(){
        return $this->belongsTo(User::class);
    
    }
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function isModified(){
        return $this->created_at != $this->updated_at;
    }

    public function isLikedBy(User $user){
        return Like::has($this, $user);
    }
}
