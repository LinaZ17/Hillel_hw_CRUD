<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{

    protected $fillable = ['title'];
    protected $table = 'choice_posts';

    //один ко многим
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
