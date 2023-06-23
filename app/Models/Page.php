<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'content',
        'label',
        'order',
    ];

    protected static function booted(): void
    {
        static::saving(function (Page $page) {
            $page->content_html = Str::markdown($page->content);
        });
    }

    public static function getForMenu()
    {
        return self::where('order', '>', 0)->orderBy('order')->get();
    }
}
