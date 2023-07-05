<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Categorys;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Posts extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $guarded = ['id'];

    // one to one relationship one post has one user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // many to many relationship one post have many categories
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Categorys::class,
            'categorys_posts',
            'post_id',
            'category_id'
        );
    }

    // one to many (polymophic) Relationship
    // this image model is used for all images in system so we will differentiate it using there imageable_type in which model name is store on it
    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    // Many To Many (Polymorphic)
    // taggable table is used for both posts and videos to differentiate it we will use morphToMany Relationship
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
