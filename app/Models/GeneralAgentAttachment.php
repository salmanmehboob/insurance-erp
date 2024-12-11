<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GeneralAgentAttachment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'general_agent_id',
        'attachment_name',
        'path',
    ];

    // Relationships
    public function generalAgent()
    {
        return $this->belongsTo(GeneralAgent::class, 'general_agent_id');
    }
}
