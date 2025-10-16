<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    /** @use HasFactory<\Database\Factories\LeadFactory> */
    use HasFactory;

    protected $guarded = [];


    public function extraInfo()
    {
        return $this->hasOne(LeadExtraInfo::class, 'lead_id');
    }

    public function leadLead()
    {
        return $this->hasOne(LeadLead::class, 'lead_id');
    }

    public function mqlData()
    {
        return $this->hasOne(LeadMqlData::class, 'lead_id');
    }

    public function financialInfo()
    {
        return $this->hasOne(LeadFinancialInfo::class, 'lead_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function salePerson()
    {
        return $this->belongsTo(User::class, 'sale_person_id');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }


    public function notes()
    {
        return $this->hasMany(LeadNote::class);
    }

    public function activities()
    {
        return $this->hasMany(LeadActivity::class)->latest();
    }
}
