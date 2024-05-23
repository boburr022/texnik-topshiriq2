<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($tag) {
            $tag->slug = static::createUniqueSlug($tag->name);
        });
    }

    public static function createUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $count = 1;

        while (Tag::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '_' . $count++;
        }

        return $slug;
    }
}

