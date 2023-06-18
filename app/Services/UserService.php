<?php

namespace App\Services;

use App\Models\UserAddress;
use MatanYadaev\EloquentSpatial\Objects\Point;

class UserService
{
    public function createAddress(array $data)
    {
        $data=[...$data,"user_id"=>request()->user()->id];
        if (isset($data['latitude'], $data['longitude'])) {
            $data = [...$data, "location" => new Point($data['latitude'], $data['longitude'])];
        }
        $order= UserAddress::create($data);
        return $order;
    }
    public function updateAddress(array $data,UserAddress $userAddress)
    {
        if (isset($data['latitude'], $data['longitude'])) {
            $data = [...$data, "location" => new Point($data['latitude'], $data['longitude'])];
        }

        $userAddress->update($data);
        return $userAddress;
    }
}
