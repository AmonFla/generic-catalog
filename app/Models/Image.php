<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'category',
        'producto'
    ];

    /**
     * Get the category that owns the comment.
     */
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category');
    }

    /**
     * Get the category that owns the comment.
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class,'producto');
    }
}
