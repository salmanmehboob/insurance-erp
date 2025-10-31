<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dwelling_general_info extends Model
{
    use  HasFactory;

    protected $table = 'dwelling_general_info';

    protected $fillable = [
       'dwelling_fire_id',
       'q1_s1_bus',
       'q1_s1_policy',
       'q1_s2_bus',
       'q1_s2_policy',
       'q2',
       'q3',
       'q4',
       'q5',
       'q6',
       'q7',
       'agencyID',
    ];

    public function dwellingFire(): BelongsTo
    {
        return $this->belongsTo(dwelling_fire_application::class, 'dwelling_fire_id');
    }
}
