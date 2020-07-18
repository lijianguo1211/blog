<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'jay_news';

    public $fillable = [
        'title',
        'content',
        'slug',
        'order',
        'status'
    ];
}
