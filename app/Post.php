<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'cover',
        'title',
        'content',
        'slug',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

    static public function getUniqueSlug($param) {

        $slug_raw = Str::slug($param);
        $slug = $slug_raw;
        
        $slug_esistente = Post::where('slug', $slug)->first();
        
        $counter = 1;

        while($slug_esistente){

            $slug = $slug_raw . '-' . $counter;
            
            $slug_esistente = Post::where('slug', $slug)->first();

            $counter++;

        }

        return $slug;
    }

    public function getCoverPathAttribute () {
        return $this->cover ? Storage::disk('images')->url($this->cover) : null;
    }

    public function getDateAttribute () {
        return $this->created_at->format('d/m/Y');
    }

    protected $appends = ['cover_path', 'date'];
}
