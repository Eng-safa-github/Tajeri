<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRoles;

class Role extends SpatieRoles
{
    use HasFactory;
    protected $fillable = ['id','name'];
    protected $hidden=['guard_name'];
    protected $attributes = [
        'guard_name' => 'api'
    ];

}
