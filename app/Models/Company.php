<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /** @use HasFactory<\Database\Factories\CompanyFactory> */
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'company_users');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'company_tags', 'company_id', 'tag_id');
    }
    // public function tags()
    // {
    //     return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    // }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function title()
    {
        return $this->belongsTo(Title::class, 'title_id', 'id');
    }

    public function addresses()
    {
        return $this->hasMany(CompanyAddress::class);
    }
    public function customerSalePurchases()
    {
        return $this->hasMany(CustomerSalePurchase::class);
    }
}
