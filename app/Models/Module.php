<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    // Module.php
    public function permissions()
    {
        return $this->hasMany(Permission::class,'module');
    }
}
