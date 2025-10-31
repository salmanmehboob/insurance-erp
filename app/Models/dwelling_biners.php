<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class dwelling_biners extends Model
{
    use  HasFactory;

    protected $table = 'dwelling_biners';

    protected $fillable = [
        'dwelling_fire_id',
        'binders_effective',
        'binders_expire',
        'binders_time',
        'binders_noon',
        'binders_coverage',
        'applicantInitials',
        'tems',
        'producerSignature',
        'producerName',
        'stateLicense',
        'applicantSignature',
        'dateApplication',
        'nationalProducer',
    ];  
    
    public function dwellingFire(): BelongsTo
    {
        return $this->belongsTo(dwelling_fire_application::class, 'dwelling_fire_id');
    }
}
