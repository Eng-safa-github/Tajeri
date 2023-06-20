<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use MatanYadaev\EloquentSpatial\Objects\Point;

class UserAddress extends Model
{
    use SoftDeletes,HasFactory;

    protected $fillable = [
        'id','address','location', 'user_id',
    ];

    protected $casts = [
        'location' => Point::class,
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }
}
