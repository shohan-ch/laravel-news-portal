<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;



    protected $fillable = [
        'title', 'description', 'category_id', 'tag', 'image',
    ];

    public function scopHeadNews($query)
    {
        # code...
        return $query->where('headnews', True);
    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function comments()
    {
        # code...
        return $this->hasMany(Comment::class);
    }
}