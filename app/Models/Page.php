<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelMarkdown\MarkdownRenderer;

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
            $html = app(MarkdownRenderer::class)->toHtml($page->content);
            $page->content_html = $html;
        });
    }

    public static function getForMenu()
    {
        return self::where('order', '>', 0)->orderBy('order')->get();
    }
}
