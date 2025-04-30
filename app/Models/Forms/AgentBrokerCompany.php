<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AgentBrokerCompany extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_broker_form_id',
        'name',
        'policy_number',
        'effective_date',
        'expiration_date',
        'line_of_business',
    ];

    /**
     * Get the agent broker form that owns the company.
     */
    public function agentBrokerForm()
    {
        return $this->belongsTo(AgentBrokerForm::class, 'agent_broker_form_id');
    }
}
