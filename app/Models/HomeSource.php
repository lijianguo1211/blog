<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class HomeSource extends Model
{
    protected $table = 'jay_home_sources';

    public $fillable = [
        'theme',
        'content',
        'author',
        'from_there'
    ];
}
