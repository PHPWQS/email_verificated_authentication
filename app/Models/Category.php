<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    protected $casts = [
      'name' => 'string'
    ];

    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'categories_to_jobs');
    }
}
