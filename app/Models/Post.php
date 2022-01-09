<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'title',
        'description',
        'choice_id',
    ];

    //один ко многим обратное отношение
    public function choice()
    {
        return $this->belongsTo(Choice::class);
    }
}
