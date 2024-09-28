<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'title', 'description', 'meta_title', 'meta_description', 'slug', 'canonical', 'promo', 'active'];

    public function images()
    {
        return $this->hasMany(EventImage::class);
    }
}
