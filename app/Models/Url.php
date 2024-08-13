<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['original_url', 'shortened_url'];

    public static function generateShortenedUrl($originalUrl)
    {
        $shortened = substr(md5(uniqid(rand(), true)), 0, 8);
        return $shortened;
    }
}
