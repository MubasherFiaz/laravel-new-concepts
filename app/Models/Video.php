<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Many To Many (Polymorphic)
    // taggable table is used for both posts and videos to differentiate it we will use morphToMany Relationship
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
