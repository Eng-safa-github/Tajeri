<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Store;
use MatanYadaev\EloquentSpatial\Objects\Point;

class OrderService
{
    public function create(array $data)
    {
        $data=[...$data,"user_id"=>request()->user()->id];
        $amount=0.0;
        foreach ($data['stores'] as $item){
            $store=Store::find($item['store_id']);
            $amount+=$store->unit_price*$item['quantity'];
        }
        $data['amount']=$amount;
        $order= Order::create($data);
        $order->orderStore()->createMany($data['stores']);
        return $order;
    }
    public function update(array $data,Order $order)
    {
        $order->update($data);
       if(isset($data['stores'])){
           $order->orderStore()->delete();
           $order->orderStore()->createMany($data['stores']);
       }
        return $order;
    }
}
