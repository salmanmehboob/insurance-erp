<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentAgency extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'agent_id',
        'agency_id',

    ];

    /**
     * Relationship with Agent (Many Agencies belong to One Agent)
     */
    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
