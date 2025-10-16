<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadExtraInfo extends Model
{
    protected $guarded = [];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}
