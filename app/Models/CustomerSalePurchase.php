<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerSalePurchase extends Model
{
    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'sale_person_id', 'id');
    }
    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id', 'id');
    }
}
