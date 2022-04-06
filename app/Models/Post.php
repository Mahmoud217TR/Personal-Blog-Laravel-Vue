<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'state',
        'user_id',
    ];

    protected $attributes = [
        'state' => 0,
    ];

    public static function states(){
        return [
            1 => 'draft',
            2 => 'published',
            3 => 'archived',
        ];
    }

    public function state(): Attribute{
        return Attribute::make(
            get: fn ($value) => $this->states()[$value],
            set: fn ($value) => array_search($value,$this->states()),
        );
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

    public function scopeDraft($query){
        return $query->where('state',1);
    }

    public function scopePublished($query){
        return $query->where('state',2);
    }

    public function scopeArchived($query){
        return $query->where('state',3);
    }
}
