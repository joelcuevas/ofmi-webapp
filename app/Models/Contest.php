<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelMarkdown\MarkdownRenderer;

class Contest extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'title',
        'description',
    ];

    protected $casts = [
        'active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (Contest $contest) {
            $html = app(MarkdownRenderer::class)->toHtml($contest->description);
            $contest->description_html = $html;
        });
    }
}
