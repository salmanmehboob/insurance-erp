<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceApplicationApplicant extends Model
{
    protected $table = 'insurance_application_applicants';

    protected $fillable = [
        'application_id',

        // Policy fields
        'policy_effective_date',
        'policy_expiration_date',
        'policy_billing_plan',
        'policy_payment_plan',
        'policy_payment_method',
        'policy_audit',
        'policy_deposit',
        'policy_minimum_premium',
        'policy_policy_premium',

        // Applicant One
        'applicant_one_name',
        'applicant_one_address',
        'applicant_one_city',
        'applicant_one_state',
        'applicant_one_zipcode',
        'applicant_one_gl_code',
        'applicant_one_sic_code',
        'applicant_one_naic_code',
        'applicant_one_soc_code',
        'applicant_one_phone',
        'applicant_one_website',
        'applicant_one_corporation',
        'applicant_one_individual',
        'applicant_one_joint_adventure',
        'applicant_one_llc',
        'applicant_one_members',
        'applicant_one_non_profit',
        'applicant_one_partnership',
        'applicant_one_sub_chapter',
        'applicant_one_trust',
        'applicant_one_other',

        // Applicant Two
        'applicant_two_name',
        'applicant_two_address',
        'applicant_two_city',
        'applicant_two_state',
        'applicant_two_zipcode',
        'applicant_two_gl_code',
        'applicant_two_sic_code',
        'applicant_two_naic_code',
        'applicant_two_soc_code',
        'applicant_two_phone',
        'applicant_two_website',
        'applicant_two_corporation',
        'applicant_two_individual',
        'applicant_two_joint_adventure',
        'applicant_two_llc',
        'applicant_two_members',
        'applicant_two_non_profit',
        'applicant_two_partnership',
        'applicant_two_sub_chapter',
        'applicant_two_trust',
        'applicant_two_other',

        // Applicant Three
        'applicant_three_name',
        'applicant_three_address',
        'applicant_three_city',
        'applicant_three_state',
        'applicant_three_zipcode',
        'applicant_three_gl_code',
        'applicant_three_sic_code',
        'applicant_three_naic_code',
        'applicant_three_soc_code',
        'applicant_three_phone',
        'applicant_three_website',
        'applicant_three_corporation',
        'applicant_three_individual',
        'applicant_three_joint_adventure',
        'applicant_three_llc',
        'applicant_three_members',
        'applicant_three_non_profit',
        'applicant_three_partnership',
        'applicant_three_sub_chapter',
        'applicant_three_trust',
        'applicant_three_other',

        // Contact Info One
        'contact_info_type_one',
        'contact_info_name_one',
        'contact_info_pp_type_one',
        'contact_info_pp_number_one',
        'contact_info_sp_type_one',
        'contact_info_sp_number_one',
        'contact_info_s_email_one',
        'contact_info_p_email_one',

        // Contact Info Two
        'contact_info_type_two',
        'contact_info_name_two',
        'contact_info_pp_type_two',
        'contact_info_pp_number_two',
        'contact_info_sp_type_two',
        'contact_info_sp_number_two',
        'contact_info_s_email_two',
        'contact_info_p_email_two',
    ];

    public function insuranceApplication()
    {
        return $this->belongsTo(InsuranceApplication::class, 'application_id');
    }
}
