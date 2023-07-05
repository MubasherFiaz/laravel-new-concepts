<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Contacts;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // one to one relationship one user has one contact
    public function contact()
    {
        return $this->hasOne(Contacts::class);
    }

    // one to many relationship one user has many posts
    public function posts()
    {
        return $this->hasMany(Posts::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */

    // contact information doesnot have direct connection with user but there is a relation between contactinformation and contact so has one through is used to make a relationship between user and contact information using contact model relation
    public function contactContactInformation(): HasOneThrough
    {
        return $this->hasOneThrough(Contactinformation::class, Contacts::class);
    }

    // one to one (polymophic) Relationship
    // this image model is used for all images in system so we will differentiate it using there imageable_type in which model name is store on it
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
