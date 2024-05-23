<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'body', 'photo'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = static::createUniqueSlug($post->title);
        });
    }

    public static function createUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '_' . $count++;
        }

        return $slug;
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}

