<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLeadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Leads table
            'company_name'      => 'sometimes|required|string|max:255',
            'street'            => 'nullable|string|max:255',
            'city'              => 'sometimes|required|string|max:255',
            'state'             => 'sometimes|required|integer',
            'zip'               => 'nullable|string|max:50',
            'country'           => 'sometimes|required|integer',
            'website'           => 'nullable|url|max:255',
            'email'             => 'sometimes|required|email|max:255',
            'job_position'      => 'sometimes|required|string|max:255',
            'phone'             => 'nullable|string|max:50',
            'mobile'            => 'sometimes|required|string|max:50',
            'customer'          => 'nullable|integer',
            'amount'            => 'nullable|numeric',
            'salesperson'       => 'nullable|integer',
            'sale_team'         => 'nullable|integer',
            'internal_notes'    => 'nullable|string',
            'status'            => 'nullable|in:lead,opportunity,lost,ticketInitial Contact/Qualification,
Needs Analysis/Discovery,
Solution Presentation/Demonstration,
Proposal Development,
Negotiation and Objections Handling,
Contract Review and Approval,
Closing,
Implementation Handover,
Cold',

            // Lead Extra Infos
            'marketing_company'       => 'nullable|integer',
            'marketing_campaign'      => 'nullable|integer',
            'marketing_medium'        => 'nullable|integer',
            'marketing_source'        => 'nullable|integer',
            'marketing_referred_by'   => 'nullable|string|max:255',
            'analysis_assignment_date' => 'nullable|date',
            'analysis_closed_date'    => 'nullable|date',

            // Lead Leads
            'lead_campaign'           => 'nullable|integer',
            'lead_source'             => 'nullable|integer',
            'lead_customer_budget'    => 'nullable|boolean',
            'lead_product_service'    => 'nullable|string|max:255',
            'lead_have_system'        => 'nullable|boolean',
            'lead_number_of_companies' => 'nullable|integer|min:0',
            'lead_number_of_employees' => 'nullable|integer|min:0',
            'lead_industry'           => 'nullable|integer',
            'lead_practice_area'      => 'nullable|integer',

            // Lead MQL Data
            'mql_business_type'       => 'nullable|in:Private,Government',
            'mql_industry'            => 'nullable|string|max:255',
            'mql_have_system'         => 'nullable|boolean',
            'mql_employees_head_count' => 'nullable|integer|min:0',
            'mql_number_of_companies' => 'nullable|integer|min:0',
            'mql_system_name'         => 'nullable|string|max:255',

            // Lead Financial Infos
            'financial_customer_budget' => 'nullable|numeric',
            'financial_license_value'   => 'nullable|numeric',
            'financial_license_amc'     => 'nullable|numeric',
            'financial_service_value'   => 'nullable|numeric',
            'financial_hosting'         => 'nullable|numeric',
            'financial_abacus_license'  => 'nullable|numeric',
            'financial_abacus_amc'      => 'nullable|numeric',
            'financial_addons_license'  => 'nullable|numeric',
            'financial_addons_amc'      => 'nullable|numeric',
        ];
    }
}
