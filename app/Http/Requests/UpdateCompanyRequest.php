<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
        $companyId = $this->route('customer');
        return [
            // --- always validated (but optional for update) ---
            'customer_type'  => ['sometimes', 'required', 'in:individual,company'],
            'customer_address' => ['nullable', 'array'],
            'customer_address.*.address_type' => ['required_with:customer_address', 'in:contact,invoice'],

            // basic formats
            'full_name'    => ['sometimes', 'required', 'string', 'max:255', Rule::unique('companies', 'name')->ignore($companyId)],
            'company_name' => ['nullable', 'string', 'max:255', Rule::unique('companies', 'company_name')->ignore($companyId)],
            'email'        => ['sometimes', 'required', 'email'],
            'mobile'       => ['nullable', 'string', 'max:50'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->has('customer_address')) {
                foreach ($this->customer_address as $index => $address) {
                    if (($address['address_type'] ?? null) === 'contact') {
                        if (empty($address['address_name'])) {
                            $validator->errors()->add("customer_address.$index.address_name", "Name is required for contact address.");
                        }
                        if (empty($address['address_mobile'])) {
                            $validator->errors()->add("customer_address.$index.address_mobile", "Mobile is required for contact address.");
                        }
                    }

                    if (($address['address_type'] ?? null) === 'invoice') {
                        if (empty($address['address_name'])) {
                            $validator->errors()->add("customer_address.$index.address_name", "Name is required for invoice address.");
                        }
                        if (empty($address['address_mobile'])) {
                            $validator->errors()->add("customer_address.$index.address_mobile", "Mobile is required for invoice address.");
                        }
                        if (empty($address['address_street'])) {
                            $validator->errors()->add("customer_address.$index.address_street", "Street is required for invoice address.");
                        }
                    }
                }
            }
        });
    }

    public function messages()
    {
        return [
            'full_name.required'       => 'Full name is required for both sole proprietor and company customers.',
            'company_name.required_if' => 'Company name is required when organization type is company.',
            'email.required'           => 'Email is required.',
            'mobile.required'          => 'Mobile number is required.',
        ];
    }
}
