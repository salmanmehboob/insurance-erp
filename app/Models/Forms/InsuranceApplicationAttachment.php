<?php

namespace App\Models\Forms;

use App\Models\Agency;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InsuranceApplicationAttachment extends Model
{
    protected $table = 'insurance_application_attachments';

    protected $fillable = [
        'application_id',

        'attachment_account_receivable',
        'attachment_additional_interest',
        'attachment_additional_premises',
        'attachment_apartment',
        'attachment_condo',
        'attachment_contractor',
        'attachment_coverage',
        'attachment_dealer',
        'attachment_driver',
        'attachment_electronic',
        'attachment_glass',
        'attachment_hotel',
        'attachment_installation',
        'attachment_liability_exposure',
        'attachment_property_exposure',
        'attachment_loss',
        'attachment_cargo',
        'attachment_premium',
        'attachment_professional',
        'attachment_restaurant',
        'attachment_statement',
        'attachment_state',
        'attachment_vacant',
        'attachment_vehicle',

        'attachment_other_one',
        'attachment_other_two',
        'attachment_other_three',
        'attachment_other_four',
        'attachment_other_five',
        'attachment_other_six',
    ];

    public function insuranceApplication()
    {
        return $this->belongsTo(InsuranceApplication::class, 'application_id');
    }
}
