<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;
    use Sluggable;
   protected $table='posts';
    protected $fillable=['title','description','content','category_id','thumbnail'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function uploadImage(Request $request,$image = null)
    {

        if($request->hasFile('thumbnail')){

            if($image){
                Storage::delete($image);
            }
            $folder = date('Y-m-d');

            return $data['thumbnail'] = $request->file('thumbnail')->store("img/{$folder}");
        }
        return null;
    }

    public function getImage()
    {
        if(!$this->thumbnail){
            return asset('/img/noimage.jpg');
        }
        return asset("uploads/{$this->thumbnail}");
    }

    public function getPostDate()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d F Y');
    }
}
