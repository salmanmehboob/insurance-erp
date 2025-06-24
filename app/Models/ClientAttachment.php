<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientAttachment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'attachment_name',
        'path',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
