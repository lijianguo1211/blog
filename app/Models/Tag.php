<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "jay_tags";

    public $fillable = [
        "tag_name", "tag_slug", "parent"
    ];
}
