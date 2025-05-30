<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceApplicationInfo   extends Model
{
    use HasFactory;
    protected $table = 'insurance_application_info';

    protected $fillable = [
        'application_id',

        // Q1
        'information_q_one_a_name',
        'information_q_one_a_relation',
        'information_q_one_a_percentage',
        'information_q_one_b_name',
        'information_q_one_b_relation',
        'information_q_one_b_percentage',

        // Q2
        'information_q_two_manual',
        'information_q_two_position',
        'information_q_two_meeting',
        'information_q_two_osha',
        'information_q_two_other',

        // Q3
        'information_q_three',

        // Q4
        'information_q_business_one',
        'information_q_policy_one',
        'information_q_business_two',
        'information_q_policy_two',
        'information_q_business_three',
        'information_q_policy_three',
        'information_q_business_four',
        'information_q_policy_four',

        // Q5
        'information_q_non_payment',
        'information_q_non_renewal',
        'information_q_agent_carrier',
        'information_q_under_writing',
        'information_q_condition',
        'information_q_condition_description',
        'information_q_other',

        // Q6–Q7
        'information_q_six',
        'information_q_seven',

        // Q8
        'information_q_eight_date_one',
        'information_q_eight_explanation_one',
        'information_q_eight_resolution_one',
        'information_q_eight_resolution_date_one',
        'information_q_eight_date_two',
        'information_q_eight_explanation_two',
        'information_q_eight_resolution_two',
        'information_q_eight_resolution_date_two',

        // Q9
        'information_q_nine_date_one',
        'information_q_nine_explanation_one',
        'information_q_nine_resolution_one',
        'information_q_nine_resolution_date_one',
        'information_q_nine_date_two',
        'information_q_nine_explanation_two',
        'information_q_nine_resolution_two',
        'information_q_nine_resolution_date_two',

        // Q10
        'information_q_ten_date_one',
        'information_q_ten_explanation_one',
        'information_q_ten_resolution_one',
        'information_q_ten_resolution_date_one',
        'information_q_ten_date_two',
        'information_q_ten_explanation_two',
        'information_q_ten_resolution_two',
        'information_q_ten_resolution_date_two',

        // Q11–15
        'information_q_eleven',
        'information_q_eleven_name',
        'information_q_twelve',
        'information_q_thirteen',
        'information_q_thirteen_detail',
        'information_q_fourteen',
        'information_q_fourteen_detail',
        'information_q_fifteen',
        'information_q_fifteen_detail',

        'remarks',
    ];

    public function application()
    {
        return $this->belongsTo(InsuranceApplication::class, 'application_id');
    }
}
