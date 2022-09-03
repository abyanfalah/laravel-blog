<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['user', 'category'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // filter
    public function scopeFilter($query, array $filters)
    {
        // search
        if ($search = $filters['search'] ?? false) {
            return $query->where('title', 'like', '%' . $search . '%');
        }

        // category
        if ($slug = $filters['category'] ?? false) {
            return $query->whereHas(
                'category',
                function ($query) use ($slug) {
                    $query->where('slug', $slug);
                }
            );
        }

        // author
        if ($username = $filters['author'] ?? false) {
            return $query->whereHas(
                'user',
                function ($query) use ($username) {
                    $query->where('username', $username);
                }
            );
        }
    }

    public function scopeSearch($query, $search)
    {
        return $query
            ->where('title', 'like', '%' .     $search . '%')
            ->orWhere('body', 'like', '%' .     $search . '%');
    }
}
