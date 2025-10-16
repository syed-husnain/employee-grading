<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    protected $fillable = ['parent_id', 'name', 'color', 'status'];

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'company_tags', 'tag_id', 'company_id')
            ->withTimestamps();
    }

    // Polymorphic Relations remove above ad
    // public function companies()
    // {
    //     return $this->morphedByMany(Company::class, 'taggable');
    // }

    public function leads()
    {
        return $this->morphedByMany(Lead::class, 'taggable');
    }
}
