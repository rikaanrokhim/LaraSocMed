<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class Post extends Model
{
    protected $guarded = ['id'];

    public function scopeSearch($query, $search)
    {
        return $query->where('content', 'like', '%' .$search. '%');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
