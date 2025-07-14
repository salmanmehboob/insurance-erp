<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientUploadedForm extends Model
{
    use HasFactory;

    protected $table = 'client_uploaded_forms';

    protected $fillable = [
        'client_id',
        'form_type',
        'path',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
} 