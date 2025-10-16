<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadLead extends Model
{
    protected $guarded = [];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }
}
