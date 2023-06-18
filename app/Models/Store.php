<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes,HasFactory;
    protected $fillable = [
        'id', 'unit', 'unit_price', 'purchasing_price','batch_number', 'production_date', 'expiry_date', 'quantity', 'remaining_quantity', 'product_id', 'is_active'
    ];
    protected $casts=[
      'unit_price'=>'float'
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function changeStatus()
    {
        $this->is_active = !$this->is_active;
        $this->save();
    }
    public function stores()
    {
        return $this->hasMany(OrderStore::class);
    }
}
