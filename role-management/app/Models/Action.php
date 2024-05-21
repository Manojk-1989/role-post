<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;

    public function submodule()
    {
        return $this->belongsTo(Submodule::class);
    }

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
