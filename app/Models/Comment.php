<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['title','user_id','post_id'];

    public function post()
    {
//        return $this->belongsToMany(Post::class);
        return $this->belongsTo(Post::class);
    }

}
