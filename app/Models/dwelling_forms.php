<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dwelling_forms extends Model
{
    use  HasFactory;

    protected $table = 'dwelling_forms';

    protected $fillable = [
        'dwelling_fire_id',
        'formAndor_r1_loc',
        'formAndor_r1_formNum',
        'formAndor_r1_formName',
        'formAndor_r1_editionDate',
        'formAndor_r1_copyright',
        'formAndor_r2_loc',
        'formAndor_r2_formNum',
        'formAndor_r2_formName',
        'formAndor_r2_editionDate',
        'formAndor_r2_copyright',
        'formAndor_r3_loc',
        'formAndor_r3_formNum',
        'formAndor_r3_formName',
        'formAndor_r3_editionDate',
        'formAndor_r3_copyright',
        'formAndor_r4_loc',
        'formAndor_r4_formNum',
        'formAndor_r4_formName',
        'formAndor_r4_editionDate',
        'formAndor_r4_copyright',
        'formAndor_r5_loc',
        'formAndor_r5_formNum',
        'formAndor_r5_formName',
        'formAndor_r5_editionDate',
        'formAndor_r5_copyright',
        'formAndor_r6_loc',
        'formAndor_r6_formNum',
        'formAndor_r6_formName',
        'formAndor_r6_editionDate',
        'formAndor_r6_copyright',
    ];

    public function dwellingFire(): BelongsTo
    {
        return $this->belongsTo(dwelling_fire_application::class, 'dwelling_fire_id');
    }
}
