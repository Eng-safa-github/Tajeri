<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use MatanYadaev\EloquentSpatial\Objects\Point;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'id', 'amount', 'user_address_id', 'user_id', 'status', 'delivery_type'
    ];
    protected $casts = [
        'location' => Point::class,
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function userAddress()
    {
        return $this->belongsTo(UserAddress::class);
    }
    public function orderStore()
    {
        return $this->hasMany(OrderStore::class);
    }
}
