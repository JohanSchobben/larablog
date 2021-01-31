<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed content
 * @property string slug
 * @property string title
 */
class Blog extends Model
{
    protected $fillable = [
        "title",
        "slug",
        "content",
        "publishDate"
    ];
}
