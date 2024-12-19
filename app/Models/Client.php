<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
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
     * Relationship with ClientAgencies (One Client can have many Agencies)
     */


    public function bank()
    {
        return $this->belongsTo(BankAccount::class, 'bank_id');
    }

    public function state()
    {
        return $this->belongsTo(UsState::class, 'state_id');
    }
    /**
     * Relationship with User table (Client linked to User model)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
