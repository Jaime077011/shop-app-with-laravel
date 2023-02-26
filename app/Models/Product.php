<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [ 'name', 'description', 'image', 'price', 'category_id'];
    protected $table = 'products';
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
     }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
