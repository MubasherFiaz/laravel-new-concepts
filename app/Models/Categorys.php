<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Categorys extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = ['id'];
    /**
     * The posts that belong to the Categorys
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        // one to many relationship one post have many catories
        return $this->belongsToMany(
            Posts::class,
            'categorys_posts',
            'post_id',
            'category_id'
        );
    }
}
