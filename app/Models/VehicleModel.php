<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['make_id', 'name'];

    // Relation to vehicle make
    public function make()
    {
        return $this->belongsTo(VehicleMake::class, 'make_id');
    }
}
