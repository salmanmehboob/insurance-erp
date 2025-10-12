<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PropertySection extends Model
{
    use  HasFactory;

    protected $table = 'property_section';

    protected $fillable = [
            'client_id',
            'invoice_date',
            'agency_name',
            'career',
            'naic_code',
            'policy_no',
            'effective_date',
            'named_insured',
            'blkt_s1_r1',
            'amount_s1_r1',
            'type_s1_r1',
            'blkt_s2_r1',
            'amount_s2_r1',
            'type_s2_r1',      
            'blkt_s1_r2',
            'amount_s1_r2',
            'type_s1_r2',
            'blkt_s2_r2',
            'amount_s2_r2',
            'type_s2_r2',     
            'sec2_agencyId',
            'remarks',
            'producerSignature',
            'producerName',
            'producerLicense',
            'applicantSignature',
            'applicationDate',
            'nationalProducerNo',
            'created_by'
    ];


    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Relationship with Client
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function PropertyPremises(): HasOne
    {
        return $this->hasOne( PropertyPremises::class, 'property_id');
    }

    public function PropertyPremisesSec(): HasOne
    {
        return $this->hasOne( PropertyPremisesSec::class, 'property_id');
    }
}