<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ciaHistory extends Model
{
    use  HasFactory;

    protected $table = 'cia_history';

    protected $fillable = [
        'commerical_appId',
        'lossHistory',
        'totalLose',
        'lossH_r1_dateOccup',
        'lossH_r1_line',
        'lossH_r1_type',
        'lossH_r1_dateClaim',
        'lossH_r1_amountPaid',
        'lossH_r1_ammountReserved',
        'lossH_r1_subro',
        'lossH_r1_clainOpen',
        'lossH_r2_dateOccup',
        'lossH_r2_line',
        'lossH_r2_type',
        'lossH_r2_dateClaim',
        'lossH_r2_amountPaid',
        'lossH_r2_ammountReserved',
        'lossH_r2_subro',
        'lossH_r2_clainOpen',
        'lossH_r3_dateOccup',
        'lossH_r3_line',
        'lossH_r3_type',
        'lossH_r3_dateClaim',
        'lossH_r3_amountPaid',
        'lossH_r3_ammountReserved',
        'lossH_r3_subro',
        'lossH_r3_clainOpen',
        'signatureCheck',
        'applicantInitials',
        'producerSign',
        'producerName',
        'stateProducerLicense',
        'applicantSign',
        'applicationDate',
        'nationalProducer',
    ];

    public function application(): BelongsTo
    {
        return $this->belongsTo(CommercialInsuranceApplication::class, 'commerical_appId');
    }
}
