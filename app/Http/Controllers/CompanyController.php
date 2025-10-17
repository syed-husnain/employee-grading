<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Tag;
use App\Models\User;
use App\Models\Title;
use App\Models\Company;
use App\Models\PaymentTerm;
use Illuminate\Http\Request;
use App\Models\CompanyAddress;
use Illuminate\Support\Facades\DB;
use App\Models\CustomerSalePurchase;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Employee;

class CompanyController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('content.customers.index');
  }

  public function getData(Request $request)
  {
    $companies = Employee::orderBy('id', 'desc');

    return DataTables::of($companies)
      ->addColumn('action', function ($row) {
        return '';
      })
      ->rawColumns(['action'])
      ->make(true);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('content.customers.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreCompanyRequest $request)
  {

    DB::beginTransaction();
    try {

      $data = [
        'type'                   => $request->customer_type,
        'name'                   => $request->full_name,
        'street'                 => $request->street,
        // 'street2'                => $request->street2,
        'city'                   => $request->city,
        'state_id'                  => $request->state,
        'zip'                    => $request->zip,
        'country_id'                => $request->country,
        'tax_id'                 => $request->tax_id,
        'customer_rank'          => $request->customer_rank,
        'sap_customer_id'        => $request->sap_customer_id,
        'supplier_rank'          => $request->supplier_rank,
        'commercial_registration' => $request->commercial_registration,

        'phone'                  => $request->phone,
        'mobile'                 => $request->mobile,
        'email'                  => $request->email,
        'website_url'                => $request->website,
        'is_customer'            => isset($request->is_customer) && $request->is_customer === 'on' ? 1 : 0


      ];


      if ($request->customer_type == 'individual') {
        $data['job_position']  = $request->job_position;
        $data['title_id']  = $request->title;
      }
      if ($request->customer_type == 'company') {
        $data['company_name']  = $request->company_name;
      }

      $customer = Company::create($data); //company is customer


      if ($request->filled('title')) {
        $titleValue = $request->title;


        if (is_numeric($titleValue)) {
          $titleId = $titleValue;
        } else {
          // Agar string aayi → pehle check karo, agar exist nahi karti to create karo
          $title = Title::firstOrCreate(['name' => $titleValue]);
          $titleId = $title->id;
        }

        // Save in customer (assuming customer table me title_id hai)
        $customer->title_id = $titleId;
        $customer->save();
      }

      // -------------------------------
      // Step 3: Handle Tags (multi-select many-to-many)
      if ($request->has('tags') && $request->filled('tags')) {
        $tagIds = [];

        foreach ($request->tags as $tagValue) {
          if (is_numeric($tagValue)) {
            $tagIds[] = $tagValue;
          } else {
            $tag = Tag::firstOrCreate(['name' => $tagValue]);
            $tagIds[] = $tag->id;
          }
        }

        // Attach/Sync tags to pivot
        $customer->tags()->sync($tagIds);
      }



      if ($request->has('customer_address') && is_array($request->customer_address)) {
        foreach ($request->customer_address as $address) {


          $addressData = [
            'company_id'         => $customer->id, // foreign key
            'address_type'       => $address['address_type'] ?? null,
            'contact_name'       => $address['address_name'] ?? null,
            'email'      => $address['address_email'] ?? null,
            'phone'      => $address['address_phone'] ?? null,
            'mobile'     => $address['address_mobile'] ?? null,
          ];
          if ($address['address_type'] == 'contact') {
            $addressData['title_id']      = $address['address_title'] ?? null;
            $addressData['job_position'] = $address['adress_job_position'] ?? null;
          } else {
            // $addressData['address_street']      = $address['address_street'] ?? null;
            $addressData['city'] = $address['address_city'] ?? null;
            $addressData['state_id'] = $address['address_state'] ?? null;
            $addressData['zip_code'] = $address['address_zip'] ?? null;
            $addressData['country_id'] = $address['address_country'] ?? null;
          }

          CompanyAddress::create($addressData);
        }
      }

      $salePurchase = [
        // sale person tab fields
        'company_id'               => $customer->id,
        'sale_person_id'           => $request->salesperson,
        'payment_term_id'          => $request->payment_terms,
        'price_list_id'            => $request->pricelist,

        'buyer_id'                 => $request->buyer,
        'purchase_payment_term_id' => $request->purchase_payment_term,
        'receipt_reminder'         => $request->receipt_reminder,
        'supplier_currency'        => $request->supplier_currency,
        'fiscal_position'          => $request->fiscal_position,
        'reference'                => $request->reference,
        'company'                  => $request->company, //misc
        'website'                  => $request->misc_website,
      ];

      CustomerSalePurchase::create($salePurchase);


      $user = User::create([
        'name' => $request->full_name,
        'email' => $request->email,
        'password' => bcrypt('password'),
      ]);

      // Directly assign role by name
      $user->assignRole('customer');

      // Sync companies with the user
      $user->companies()->sync([$customer->id]);

      DB::commit();
      return response()->json([
        'status' => true,
        'message' => 'Organization created successfully.',
        'data'    => $customer,
        'redirect_url' => route('organizations.index')
      ], 201);
    } catch (\Exception $e) {
      DB::rollBack();
      return response()->json([
        'status' => false,
        'message' => 'Failed to create customer.',
        'errors' => $e->getMessage(),
      ]);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    $employee = Employee::with('certificates')->findOrFail($id);

    return view('content.customers.show', compact('employee'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id)
  {

    $customer = Company::with(['tags', 'addresses', 'customerSalePurchases'])->findOrFail($id);
    $titles   = Title::all();
    $tags     = Tag::all();
    $paymentTerms = PaymentTerm::all();

    return view('content.customers.edit', compact('customer', 'titles', 'tags', 'paymentTerms'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateCompanyRequest $request, $id)
  {
    // dd($request->all());
    DB::beginTransaction();
    try {
      $customer = Company::findOrFail($id);

      $data = [
        'type'                   => $request->customer_type,
        'name'                   => $request->full_name,
        'street'                 => $request->street,
        'city'                   => $request->city,
        'state_id'                  => $request->state,
        'zip'                    => $request->zip,
        'country_id'                => $request->country,
        'tax_id'                 => $request->tax_id,
        'customer_rank'          => $request->customer_rank,
        'sap_customer_id'        => $request->sap_customer_id,
        'supplier_rank'          => $request->supplier_rank,
        'commercial_registration' => $request->commercial_registration,
        'phone'                  => $request->phone,
        'mobile'                 => $request->mobile,
        // 'email'                  => $request->email,
        'website_url'            => $request->website,
        'is_customer'            => isset($request->is_customer) && $request->is_customer === 'on' ? 1 : 0,
      ];

      if ($request->customer_type == 'individual') {
        $data['job_position']  = $request->job_position;
        $data['title_id']      = $request->title;
        $data['company_name']  = null; // clear opposite
      } else {
        $data['company_name']  = $request->company_name;
        $data['job_position']  = null;
        $data['title_id']      = null;
      }

      $customer->update($data);

      // ✅ Title handling
      if ($request->filled('title')) {
        $titleValue = $request->title;
        if (is_numeric($titleValue)) {
          $titleId = $titleValue;
        } else {
          $title = Title::firstOrCreate(['name' => $titleValue]);
          $titleId = $title->id;
        }
        $customer->title_id = $titleId;
        $customer->save();
      }

      // ✅ Tags
      if ($request->has('tags') && $request->filled('tags')) {
        $tagIds = [];
        foreach ($request->tags as $tagValue) {
          if (is_numeric($tagValue)) {
            $tagIds[] = $tagValue;
          } else {
            $tag = Tag::firstOrCreate(['name' => $tagValue]);
            $tagIds[] = $tag->id;
          }
        }
        $customer->tags()->sync($tagIds);
      } else {
        $customer->tags()->sync([]); // clear if empty
      }

      // ✅ Addresses
      CompanyAddress::where('company_id', $customer->id)->delete();
      if ($request->has('customer_address') && is_array($request->customer_address)) {
        foreach ($request->customer_address as $address) {
          $addressData = [
            'company_id'   => $customer->id,
            'address_type' => $address['address_type'] ?? null,
            'contact_name' => $address['address_name'] ?? null,
            'email'        => $address['address_email'] ?? null,
            'phone'        => $address['address_phone'] ?? null,
            'mobile'       => $address['address_mobile'] ?? null,
          ];

          if ($address['address_type'] == 'contact') {
            $addressData['title_id']     = $address['address_title'] ?? null;
            $addressData['job_position'] = $address['adress_job_position'] ?? null;
          } else {
            $addressData['city']       = $address['address_city'] ?? null;
            $addressData['state_id']   = $address['address_state'] ?? null;
            $addressData['zip_code']   = $address['address_zip'] ?? null;
            $addressData['country_id'] = $address['address_country'] ?? null;
          }

          CompanyAddress::create($addressData);
        }
      }

      // ✅ Sale Purchase (update or create)
      $salePurchase = [
        'company_id'               => $customer->id,
        'sale_person_id'           => $request->salesperson,
        'payment_term_id'          => $request->payment_terms,
        'price_list_id'            => $request->pricelist,
        'buyer_id'                 => $request->buyer,
        'purchase_payment_term_id' => $request->purchase_payment_term,
        'receipt_reminder'         => $request->receipt_reminder,
        'supplier_currency'        => $request->supplier_currency,
        'fiscal_position'          => $request->fiscal_position,
        'reference'                => $request->reference,
        'company'                  => $request->company,
        'website'                  => $request->misc_website,
      ];

      CustomerSalePurchase::updateOrCreate(
        ['company_id' => $customer->id],
        $salePurchase
      );

      // ✅ Update user
      // $user = User::where('email', $request->email)->first();
      // if ($user) {
      //     $user->update([
      //         'name'  => $request->full_name,
      //         'email' => $request->email,
      //     ]);
      // }

      DB::commit();
      return response()->json([
        'status' => true,
        'message' => 'Organization updated successfully.',
        'redirect_url' => route('organizations.index')
      ], 200);
    } catch (\Exception $e) {
      DB::rollBack();
      return response()->json([
        'status' => false,
        'message' => 'Failed to update organization.',
        'errors' => $e->getMessage(),
      ]);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Company $company)
  {
    //
  }
}
