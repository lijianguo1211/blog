<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "jay_categories";

    public $fillable = [
        "categories_name", "categories_slug", "parent"
    ];
}
