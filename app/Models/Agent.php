<?php

namespace App\Models;

use App\Models\Forms\AdditionalRemarkForm;
use App\Models\Forms\AgentBrokerForm;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'user_id',
        'address',
        'city',
        'state_id',
        'zip_code',
        'phone_no',
        'note',
        'email',
        'username',
        'password',
        'bank_id',
        'commission_in_percentage',
        'commission_fee',
    ];

    /**
     * Relationship with AgentAgencies (One Agent can have many Agencies)
     */
    public function agentAgencies()
    {
        return $this->hasMany(AgentAgency::class);
    }

    public function bank()
    {
        return $this->belongsTo(BankAccount::class, 'bank_id');
    }

    public function state()
    {
        return $this->belongsTo(UsState::class, 'state_id');
    }
    /**
     * Relationship with User table (Agent linked to User model)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function agentBrokerForms()
    {
        return $this->hasMany(AgentBrokerForm::class, 'agent_id');
    }

    public function agencies()
    {
        return $this->belongsToMany(Agency::class, 'agent_agencies', 'agent_id', 'agency_id');
    }

}
