<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dwelling_remarks extends Model
{
    use  HasFactory;

    protected $table = 'dwelling_remarks';

    protected $fillable = [
        'dwelling_fire_id',
        'remarks_check_earth',
        'remarks_check_pers',
        'remarks_check_residence',
        'remarks_check_windstrom',
        'remarks_check_flood',
        'remarks_check_photograph',
        'remarks_check_solid',
        'remarks_check_',
        'remarks_check_other',
        'remarks_check_lead',
        'remarks_check_protection',
        'remarks_check_state',
        'remarks_check_',
        'remarks_check_other2',
        'remarks_check_personal',
        'remarks_check_replacement',
        'remarks_check_water',
        'remarks_check_',
        'remarks_check_other3',
        'remarks',
        'agencyID',
    ];

    public function dwellingFire(): BelongsTo
    {
        return $this->belongsTo(dwelling_fire_application::class, 'dwelling_fire_id');
    }

}
