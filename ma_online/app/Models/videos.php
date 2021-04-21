<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_link', 'title', 'description', 'tags', 'views', 'star_one', 'star_two', 'star_three', 'star_four', 'star_five', 'user_id'
    ];
}
