<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'owner_id',
        'type_id',
        'title',
        'short_des',
        'image',
        'banner_image',
        'description',
        'artist_name',
        'price',
        'file_name',
        'file_size',
        'location',
        'insert_date',
        'update_date',
        'approve_date',
        'mapping_status',
        'owner_status',
        'status',
        'created_by',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function owner()
    {
        return $this->belongsTo(ContentOwner::class, 'owner_id');
    }

    public function type()
    {
        return $this->belongsTo(ContentType::class, 'type_id');
    }
}
