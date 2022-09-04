<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory;
    // use Sluggable;

    protected $guarded = ['id'];
    protected $with = ['user', 'category'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, array $filters)
    {
        // filter by search
        if ($search = $filters['search'] ?? false) {
            $query->where('title', 'like', '%' . $search . '%');
        }

        // filter by author
        if ($username = $filters['author'] ?? false) {
            $query->whereHas('user', function ($query) use ($username) {
                $query->where('username', $username);
            });
        }

        // filter by category
        if ($slug = $filters['category'] ?? false) {
            $query->whereHas('category', function ($query) use ($slug) {
                $query->where('slug', $slug);
            });
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }
}
