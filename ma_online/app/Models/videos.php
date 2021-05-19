<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    use HasFactory;
    protected $fillable = [
        'video_id', 'title', 'description', 'tags', 'duration', 'star_one', 'star_two', 'star_three', 'star_four', 'star_five', 'user_id'
    ];
}
