<?php

namespace App\Helpers;

use App\Models\Country;
use App\Models\State;

class LocationHelper
{
    // Countries fetch karne ka helper
    public static function getCountries($search = null)
    {
        return Country::when($search, function ($query, $search) {
            $query->where('name', 'like', "%$search%");
        })->limit(20)->get(['id', 'name']);
    }

    // States fetch karne ka helper
    public static function getStates($countryId = null, $search = null)
    {
        return State::when($countryId, function ($query, $countryId) {
            $query->where('country_id', $countryId);
        })->when($search, function ($query, $search) {
            $query->where('name', 'like', "%$search%");
        })->limit(20)->get(['id', 'name', 'country_id']);
    }
}
