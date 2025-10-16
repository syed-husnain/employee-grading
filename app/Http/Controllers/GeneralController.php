<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Helpers\LocationHelper;

class GeneralController extends Controller
{
    public function getCountries(Request $request)
    {
        $search = $request->input('search');
        $countries = LocationHelper::getCountries($search);

        return response()->json([
            'status' => true,
            'results' => $countries->map(function ($country) {
                return [
                    'id' => $country->id,
                    'text' => $country->name,
                ];
            }),
        ]);
    }

    public function getStates(Request $request)
    {
        $countryId = $request->input('country_id');
        $search = $request->input('search');
        $states = LocationHelper::getStates($countryId, $search);

        return response()->json([
            'status' => true,
            'results' => $states->map(function ($state) {
                return [
                    'id' => $state->id,
                    'text' => $state->name,
                ];
            }),
        ]);
    }

    public function getNonCustomerUsers()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->whereIn('name', ['customer', 'super admin']);
        })->get();

        return response()->json([
            'status' => true,
            'results' => $users->map(function ($user) {
                return [
                    'id' => $user->id,
                    'text' => $user->name,
                ];
            }),
        ]);
    }
    public function getCustomerUsers()
    {
        $customers = Company::get();
        return response()->json([
            'status' => true,
            'results' => $customers->map(function ($customer) {
                return [
                    'id' => $customer->id,
                    'text' => $customer->name,
                ];
            }),
        ]);
    }

    public function getCustomerDetail(Request $request)
    {
        $customerId = $request->input('customer_id');

        try {
            $customer = Company::with(['tags', 'addresses', 'customerSalePurchases', 'country', 'state'])->findOrFail($customerId);

            return response()->json([
                'status' => true,
                'customer' => $customer,
                'message' => 'Customer found'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'customer' => null,
                'message' => 'Customer not found'
            ]);
        }
    }
}
