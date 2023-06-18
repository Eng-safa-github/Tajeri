<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatieRoles;

class Permission extends SpatieRoles
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $hidden=['guard_name'];
    protected $attributes = [
        'guard_name' => 'api'
    ];
}
