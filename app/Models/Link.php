<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'jay_links';

    public $fillable = [
        'title', 'title_slug'
    ];
}
