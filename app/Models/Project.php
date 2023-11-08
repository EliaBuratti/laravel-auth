<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'slug', 'cover_image', 'skills', 'poject_link'];

    protected function cover_image(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                if (strstr($value, 'https') !== false) {
                    return $value;
                } else {
                    dd($value);
                    return asset('storage/' . $value);
                }
            }
        );
    }
}
