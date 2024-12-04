<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AgentAgency extends Model
{
    use HasFactory;

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

    public function agencies()
    {
        return $this->belongsToMany(Agency::class, 'agent_agencies', 'agent_id', 'agency_id');
    }


    public function locations()
    {
        return $this->belongsTo(Agency::class ,'agency_id');
    }
}
