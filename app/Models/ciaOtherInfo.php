<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ciaOtherInfo extends Model
{
    use  HasFactory;

    protected $table = 'cia_other_info';

    protected $fillable = [
        'commerical_appId',
        'remarksInstruction',
        'priorCI_r1_year',
        'priorCI_r1_gl',
        'priorCI_r1_autmob',
        'priorCI_r1_property',
        'priorCI_r1_other',
        'priorCI_r1_pgl',
        'priorCI_r1_pautomob',
        'priorCI_r1_pproperty',
        'priorCI_r1_pother',
        'priorCI_r1_pRgl',
        'priorCI_r1_pRautomob',
        'priorCI_r1_pRproperty',
        'priorCI_r1_pRother',
        'priorCI_r1_egl',
        'priorCI_r1_eautomob',
        'priorCI_r1_eproperty',
        'priorCI_r1_eother',
        'priorCI_r1_exgl',
        'priorCI_r1_exautomob',
        'priorCI_r1_exproperty',
        'priorCI_r1_exother',
        'priorCI_r2_year',
        'priorCI_r2_gl',
        'priorCI_r2_autmob',
        'priorCI_r2_property',
        'priorCI_r2_other',
        'priorCI_r2_pgl',
        'priorCI_r2_pautomob',
        'priorCI_r2_pproperty',
        'priorCI_r2_pother',
        'priorCI_r2_pRgl',
        'priorCI_r2_pRautomob',
        'priorCI_r2_pRproperty',
        'priorCI_r2_pRother',
        'priorCI_r2_egl',
        'priorCI_r2_eautomob',
        'priorCI_r2_eproperty',
        'priorCI_r2_eother',
        'priorCI_r2_exgl',
        'priorCI_r2_exautomob',
        'priorCI_r2_exproperty',
        'priorCI_r2_exother',
        'priorCI_r3_year',
        'priorCI_r3_gl',
        'priorCI_r3_autmob',
        'priorCI_r3_property',
        'priorCI_r3_other',
        'priorCI_r3_pgl',
        'priorCI_r3_pautomob',
        'priorCI_r3_pproperty',
        'priorCI_r3_pother',
        'priorCI_r3_pRgl',
        'priorCI_r3_pRautomob',
        'priorCI_r3_pRproperty',
        'priorCI_r3_pRother',
        'priorCI_r3_egl',
        'priorCI_r3_eautomob',
        'priorCI_r3_eproperty',
        'priorCI_r3_eother',
        'priorCI_r3_exgl',
        'priorCI_r3_exautomob',
        'priorCI_r3_exproperty',
        'priorCI_r3_exother',
    ];

    public function application(): BelongsTo
    {
        return $this->belongsTo(CommercialInsuranceApplication::class, 'commerical_appId');
    }
}
