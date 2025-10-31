<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dwelling_prior_coverages extends Model
{
    use  HasFactory;

    protected $table = 'dwelling_prior_coverages';

    protected $fillable = [
        'dwelling_fire_id',
        'prior_carrier',
        'prior_policy',
        'prior_expire',
        'localHistory',
        'applicantInitials',
        'localHistory_s1_lossdate',
        'localHistory_s1_losstype',
        'localHistory_s1_desc',
        'localHistory_s1_cat',
        'localHistory_s1_amountP',
        'localHistory_s1_enteredby',
        'localHistory_s1_indespute',
        'localHistory_s2_lossdate',
        'localHistory_s2_losstype',
        'localHistory_s2_desc',
        'localHistory_s2_cat',
        'localHistory_s2_amountP',
        'localHistory_s2_enteredby',
        'localHistory_s2_indespute',
        'localHistory_s3_lossdate',
        'localHistory_s3_losstype',
        'localHistory_s3_desc',
        'localHistory_s3_cat',
        'localHistory_s3_amountP',
        'localHistory_s3_enteredby',
        'localHistory_s3_indespute',
        'additionalINT_insured',
        'additionalINT_lender',
        'additionalINT_lienholder',
        'additionalINT_loss',
        'additionalINT_mortgagee',
        'additionalINT_trustee',
        'additionalINT_other',
        'additionalINT_otherField',
        'additionalINT_nameAddress',
        'additionalINT_rank',
        'additionalINT_certificate',
        'additionalINT_sendEmail',
        'additionalINT_loan',
    ];

    public function dwellingFire(): BelongsTo
    {
        return $this->belongsTo(dwelling_fire_application::class, 'dwelling_fire_id');
    }
}
