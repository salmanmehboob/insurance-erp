<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceApplicationPrior   extends Model
{
    use HasFactory;

    protected $table = 'insurance_application_prior';

    protected $fillable = [
        'application_id',

        'carrier_one_year',
        'carrier_one_gl',
        'carrier_one_auto',
        'carrier_one_property',
        'carrier_one_other',

        'carrier_policy_one_gl',
        'carrier_policy_one_auto',
        'carrier_policy_one_property',
        'carrier_policy_one_other',

        'carrier_premium_one_gl',
        'carrier_premium_one_auto',
        'carrier_premium_one_property',
        'carrier_premium_one_other',

        'carrier_effective_one_gl',
        'carrier_effective_one_auto',
        'carrier_effective_one_property',
        'carrier_effective_one_other',

        'carrier_expiration_one_gl',
        'carrier_expiration_one_auto',
        'carrier_expiration_one_property',
        'carrier_expiration_one_other',


        'carrier_two_year',
        'carrier_two_gl',
        'carrier_two_auto',
        'carrier_two_property',
        'carrier_two_other',

        'carrier_policy_two_gl',
        'carrier_policy_two_auto',
        'carrier_policy_two_property',
        'carrier_policy_two_other',

        'carrier_premium_two_gl',
        'carrier_premium_two_auto',
        'carrier_premium_two_property',
        'carrier_premium_two_other',

        'carrier_effective_two_gl',
        'carrier_effective_two_auto',
        'carrier_effective_two_property',
        'carrier_effective_two_other',

        'carrier_expiration_two_gl',
        'carrier_expiration_two_auto',
        'carrier_expiration_two_property',
        'carrier_expiration_two_other',


        'carrier_three_year',
        'carrier_three_gl',
        'carrier_three_auto',
        'carrier_three_property',
        'carrier_three_other',

        'carrier_policy_three_gl',
        'carrier_policy_three_auto',
        'carrier_policy_three_property',
        'carrier_policy_three_other',

        'carrier_premium_three_gl',
        'carrier_premium_three_auto',
        'carrier_premium_three_property',
        'carrier_premium_three_other',

        'carrier_effective_three_gl',
        'carrier_effective_three_auto',
        'carrier_effective_three_property',
        'carrier_effective_three_other',

        'carrier_expiration_three_gl',
        'carrier_expiration_three_auto',
        'carrier_expiration_three_property',
        'carrier_expiration_three_other',

        'loss_year',
        'loss_amount',

        'loss_one_date',
        'loss_one_line',
        'loss_one_description',
        'loss_one_claim_date',
        'loss_one_amount_paid',
        'loss_one_amount_reserved',
        'loss_one_subrogation',
        'loss_one_claim_open',

        'loss_two_date',
        'loss_two_line',
        'loss_two_description',
        'loss_two_claim_date',
        'loss_two_amount_paid',
        'loss_two_amount_reserved',
        'loss_two_subrogation',
        'loss_two_claim_open',

        'loss_three_date',
        'loss_three_line',
        'loss_three_description',
        'loss_three_claim_date',
        'loss_three_amount_paid',
        'loss_three_amount_reserved',
        'loss_three_subrogation',
        'loss_three_claim_open',
    ];

    public function application()
    {
        return $this->belongsTo(InsuranceApplication::class, 'application_id');
    }
}
