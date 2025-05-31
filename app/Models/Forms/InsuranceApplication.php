<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceApplication extends Model
{
    use  HasFactory;

    protected $guarded = [];

    protected $fillable = [

        'client_id',

        'invoice_date',
        'agency_name',
        'agency_address',
        'agency_city',
        'agency_state',
        'agency_zipcode',

        'contact_name',
        'contact_phone_no',
        'contact_fax_no',
        'contact_email',
        'code',
        'sub_code',
        'producer_customer_id',

        'carrier',
        'naic_code',
        'program_name',
        'program_code',
        'policy_number',
        'under_writer',
        'under_writer_office',

        'status_quote',
        'status_bound',
        'status_change',
        'status_cancel',
        'status_issue_policy',
        'status_renew',
        'status_date',
        'status_time',


        'signature_notice',
        'applicant',
        'procedure_signature',
        'procedure_name',
        'procedure_license',
        'applicant_signature',
        'applicant_date',
        'procedure_no',
        'created_by',
    ];

    public function applicantt()
    {
        return $this->hasOne(InsuranceApplicationApplicant::class, 'application_id');
    }

    public function attachment()
    {
        return $this->hasOne(InsuranceApplicationAttachment::class, 'application_id');
    }

    public function business()
    {
        return $this->hasOne(InsuranceApplicationBusiness::class, 'insurance_application_id');
    }

    public function information()
    {
        return $this->hasOne(InsuranceApplicationInfo::class, 'application_id');
    }

    public function premises()
    {
        return $this->hasOne(InsuranceApplicationPremise::class, 'application_id');
    }

    public function prior()
    {
        return $this->hasOne(InsuranceApplicationPrior::class, 'application_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
