<?php

namespace App\Http\Controllers;

use DataTables;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Models\Medium;
use App\Models\Source;
use App\Models\Company;
use App\Models\Campaign;
use App\Models\Industry;
use App\Models\LeadLead;
use App\Models\LeadNote;
use App\Models\LeadMqlData;
use App\Models\LeadActivity;
use App\Models\PracticeArea;
use App\Models\LeadExtraInfo;
use App\Models\LeadFinancialInfo;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLeadRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateLeadRequest;

class PipelineController extends Controller
{
    public function index()
    {
        return view('content.pipelines.index');
    }

    public function getData(Request $request)
    {
        $companies = Lead::with([
            'country:id,name',
            'state:id,name',
            'company:id,name',
            // 'sapCustomerRelation:id,customer_code'
        ])->whereIn('status', ['lost', 'opportunity', 'Initial Contact/Qualification', 'Needs Analysis/Discovery', 'Solution Presentation/Demonstration', 'Proposal Development', 'Negotiation and Objections Handling', 'Contract Review and Approval', 'Closing', 'Implementation Handover', 'Cold', 'lost'])
            ->select([
                'id',
                'company_name',
                'street',
                'city',
                'state_id',
                'zip',
                'country_id',
                'website',
                'email',
                'job_position',
                'phone',
                'mobile',
                'company_id',
                'amount',
                'sale_person_id',
                'sale_team_id',
                'status'
            ]);

        return DataTables::of($companies)
            ->addColumn('country_name', function ($row) {
                return $row->country?->name ?? '';
            })
            ->addColumn('state_name', function ($row) {
                return $row->state?->name ?? '';
            })
            ->addColumn('sale_person', function ($row) {
                return $row->salePerson?->name ?? '';
            })
            ->addColumn('status', function ($row) {
                return '<span class="badge bg-label-' . ($row->status == 'lost' ? 'danger' : 'primary') . ' me-1">' . ucfirst($row->status) . '</span>';
            })
            ->addColumn('action', function ($row) {
                return '';
            })
            ->rawColumns(['action', 'country_name', 'state_name', 'sale_person', 'status'])
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $lead = Lead::with([
            'extraInfo',
            'leadLead',
            'mqlData',
            'financialInfo',
        ])->findOrFail($id);

        $tags = Tag::where('type', 'lead')->get();
        $companies = Company::whereHas('users', function ($query) {
            $query->where('user_id', auth()->id());
        })->get();

        $campaigns = Campaign::get();
        $mediums = Medium::get();
        $sources = Source::get();
        $industries = Industry::get();
        $practiceAreas = PracticeArea::get();

        return view('content.pipelines.edit', compact(
            'lead',
            'tags',
            'companies',
            'campaigns',
            'mediums',
            'sources',
            'industries',
            'practiceAreas'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeadRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $lead = Lead::findOrFail($id);

            // 1. Update Lead
            $lead->update([
                'company_name'   => $request->company_name,
                'street'         => $request->street,
                'city'           => $request->city,
                'state_id'       => $request->state,
                'zip'            => $request->zip,
                'country_id'     => $request->country,
                'website'        => $request->website,
                'email'          => $request->email,
                'contact_name'   => $request->contact_name,
                'job_position'   => $request->job_position,
                'phone'          => $request->phone,
                'mobile'         => $request->mobile,
                'company_id'     => $request->customer,
                'amount'         => $request->amount,
                'sale_person_id' => $request->salesperson ?? auth()->id(),
                'sale_team_id'   => $request->sale_team,
                'internal_notes' => $request->internal_notes,
                'status'         => isset($request->status) ? $request->status : 'lead',
            ]);

            // User ne jo checkboxes select kiye unke IDs array me milenge
            $selectedTags = $request->input('tags', []);

            // Purane saare remove ho jayenge aur naye selected attach ho jayenge
            $lead->tags()->sync($selectedTags);

            // 2. Update or Create Extra Info
            LeadExtraInfo::updateOrCreate(
                ['lead_id' => $lead->id],
                [
                    'company_id'      => $request->input('marketing_company'),
                    'compaign_id'     => $request->input('marketing_campaign'),
                    'medium_id'       => $request->input('marketing_medium'),
                    'source_id'       => $request->input('marketing_source'),
                    'refered_by'      => $request->input('marketing_referred_by'),
                    'assignment_date' => $request->input('analysis_assignment_date'),
                    'closed_date'     => $request->input('analysis_closed_date'),
                ]
            );

            // 3. Update or Create Lead Leads
            LeadLead::updateOrCreate(
                ['lead_id' => $lead->id],
                [
                    'compaign_id'      => $request->input('lead_campaign'),
                    'source_id'        => $request->input('lead_source'),
                    'customer_budget'  => $request->input('lead_customer_budget'),
                    'product_service'  => $request->input('lead_product_service'),
                    'have_system'      => $request->input('lead_have_system'),
                    'no_of_companies'  => $request->input('lead_number_of_companies'),
                    'no_of_employees'  => $request->input('lead_number_of_employees'),
                    'industry_id'      => $request->input('lead_industry'),
                    'practice_area_id' => $request->input('lead_practice_area'),
                ]
            );

            // 4. Update or Create MQL Data temporary closed
            LeadMqlData::updateOrCreate(
                ['lead_id' => $lead->id],
                [
                    'business_type'        => $request->input('mql_business_type'),
                    'industry_id'          => $request->input('mql_industry'),
                    'have_system'          => $request->input('mql_have_system'),
                    'employees_head_count' => $request->input('mql_employees_head_count'),
                    'number_of_companies'  => $request->input('mql_number_of_companies'),
                    'system_name'          => $request->input('mql_system_name'),
                ]
            );

            // 5. Update or Create Financial Info
            LeadFinancialInfo::updateOrCreate(
                ['lead_id' => $lead->id],
                [
                    'customer_budget' => $request->input('financial_customer_budget'),
                    'license_value'   => $request->input('financial_license_value'),
                    'license_amc'     => $request->input('financial_license_amc'),
                    'service_value'   => $request->input('financial_service_value'),
                    'hosting'         => $request->input('financial_hosting'),
                    'abacus_license'  => $request->input('financial_abacus_license'),
                    'abacus_amc'      => $request->input('financial_abacus_amc'),
                    'addons_license'  => $request->input('financial_addons_license'),
                    'addons_amc'      => $request->input('financial_addons_amc'),
                ]
            );

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Pipeline updated successfully.',
                'data' => $lead,
                'redirect_url' => route('pipelines.index')
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status'  => false,
                'error'   => 'Failed to update lead',
                'details' => $e->getMessage(),
            ], 500);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($lead)
    {
        //
    }
}
