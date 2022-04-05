<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    protected $attributes = [
        'state' => 0,
    ];

    public static function states(){
        return [
            0 => 'draft',
            1 => 'published',
            2 => 'archived',
        ];
    }

    public function getStateAttribute($attribute){
        return $this->states()[$attribute];
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function votes(){
        return $this->belongsToMany(User::class,'votes')->withPivot('upvote');
    }

    public function isDraft(){
        return $this->state == 'draft';
    }

    public function isPublished(){
        return $this->state == 'published';
    }

    public function isArchived(){
        return $this->state == 'archived';
    }

    public function isModified(){
        return $this->created_at != $this->updated_at;
    }

    public function scopePublished($query){
        return $query->where('state',1);
    }
}
