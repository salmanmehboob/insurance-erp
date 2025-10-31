<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dwelling_general_info_residential extends Model
{
    use  HasFactory;

    protected $table = 'dwelling_general_info_residential';

    protected $fillable = [
        'dwelling_fire_id',
        'gn_q1_farming',
        'gn_q1_telecom',
        'gn_q1_dayCare',
        'gn_q1_home',
        'gn_q2',
        'gn_q3_s1_animal',
        'gn_q3_s1_breed',
        'gn_q3_s1_bite',
        'gn_q3_s2_animal',
        'gn_q3_s2_breed',
        'gn_q3_s2_bite',
        'gn_q4',
        'gn_q5',
        'gn_q6',
        'gn_q8',
        'gn_q8a',
        'gn_q9',
        'gn_q10',
        'gn_q11a',
        'gn_q11b',
        'gn_q11c',
        'gn_q12',
        'gn_q13_start',
        'gn_q13_comp',
        'gn_q13_int',
        'gn_q13_ext',
        'gn_q13_addition',
        'gn_q13_level',
        'qn_q13_y',
        'qn_q13_inc',
        'qn_q13_excl',
        'qn_q13_N',
        'qn_q13_cost',
        'gn_q14',
        'gn_q15',
    ];

    public function dwellingFire(): BelongsTo
    {
        return $this->belongsTo(dwelling_fire_application::class, 'dwelling_fire_id');
    }
}
