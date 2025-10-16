<?php

namespace App\Observers;

use App\Models\Lead;
use App\Models\LeadActivity;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class LeadObserver
{
    protected $ignore = ['updated_at', 'created_at'];

    protected $relations = [
        'country_id' => [
            'model' => \App\Models\Country::class,
            'column' => 'name',
        ],
        'state_id' => [
            'model' => \App\Models\State::class,
            'column' => 'name',
        ],
        'sale_person_id' => [
            'model' => \App\Models\User::class,
            'column' => 'name',
        ],
    ];

    // pretty labels for fields
    protected $labels = [
        'email'          => 'Email',
        'phone'          => 'Phone',
        'status'         => 'Status',
        'company_name'   => 'Company Name',
        'street'         => 'Street',
        'city'           => 'City',
        'state_id'       => 'State',
        'zip'            => 'ZIP',
        'country_id'     => 'Country',
        'website'        => 'Website',
        'contact_name'   => 'Contact Name',
        'job_position'   => 'Job Position',
        'mobile'         => 'Mobile',
        'amount'         => 'Amount',
        'internal_notes' => 'Internal Notes',

    ];

    /**
     * Handle the Lead "created" event.
     */
    public function created(Lead $lead): void
    {
        try {
            LeadActivity::create([
                'lead_id' => $lead->id,
                'user_id' => Auth::id() ?? null,
                'action'  => 'lead_created',
                'details' => 'Lead/Opportunity created',
                'meta'    => null,
            ]);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }

    /**
     * Handle the Lead "updated" event.
     */
    public function updated(Lead $lead): void
    {
        try {
            $dirty = $lead->getDirty();
            $original = $lead->getOriginal();

            foreach ($dirty as $field => $newValue) {
                if (in_array($field, $this->ignore)) continue;

                $oldValue = $original[$field] ?? null;

                if ($oldValue == $newValue) continue;

                // Agar field relation wali hai to naam resolve karo
                if (isset($this->relations[$field])) {
                    $relation = $this->relations[$field];
                    $modelClass = $relation['model'];
                    $column = $relation['column'];

                    $oldValue = $oldValue ? $modelClass::find($oldValue)?->$column : null;
                    $newValue = $newValue ? $modelClass::find($newValue)?->$column : null;
                }

                $label = $this->labels[$field] ?? ucfirst(str_replace('_', ' ', $field));
                $details = "{$label} changed from \"{$oldValue}\" → \"{$newValue}\"";

                LeadActivity::create([
                    'lead_id' => $lead->id,
                    'user_id' => Auth::id() ?? null,
                    'action' => 'field_updated',
                    'details' => $details,
                    'meta' => [
                        'field' => $field,
                        'old' => $oldValue,
                        'new' => $newValue
                    ],
                ]);
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }

    /**
     * Handle the Lead "deleted" event.
     */
    public function deleted(Lead $lead): void
    {
        //
    }

    /**
     * Handle the Lead "restored" event.
     */
    public function restored(Lead $lead): void
    {
        //
    }

    /**
     * Handle the Lead "force deleted" event.
     */
    public function forceDeleted(Lead $lead): void
    {
        //
    }
}
