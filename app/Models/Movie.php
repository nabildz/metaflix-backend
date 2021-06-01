<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{

    use SoftDeletes;

    protected $fillable = [
        "tmbd_id", "tmbd_vote_average", "language", "title", "image_url", "release_date", "status", "rating", "review"
    ];


}
