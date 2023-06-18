<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStore extends Model
{
    use SoftDeletes,HasFactory;   
    protected $fillable = [
        'id', 'quantity', 'store_id', 'order_id'
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
