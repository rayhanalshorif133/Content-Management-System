<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'status',
        'created_by',
        'updated_by',
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
