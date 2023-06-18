<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;
use App\Http\Resources\UserAddressResource;
use App\Services\UserService;
use App\Models\UserAddress;
use Yajra\DataTables\DataTables;

class UserAddressController extends Controller
{
    public function __construct(public UserService $userService)
    {

    }
    public function index()
    {
        $userAddresses= UserAddress::where("user_id",request()->user()->id)->paginate(request()->get('perPage', 10));
        return UserAddressResource::collection($userAddresses);
    }

    public function store(StoreUserAddressRequest $request)
    {
        $address = $this->userService->createAddress($request->validated());
        return UserAddressResource::make($address);
    }

    public function show(UserAddress $userAddress)
    {
        return UserAddressResource::make($userAddress);
    }

    public function update(UpdateUserAddressRequest $request,UserAddress $userAddress)
    {
         $this->userService->updateAddress($request->validated(),$userAddress);
        return UserAddressResource::make($userAddress);
    }

    public function destroy(UserAddress $userAddress)
    {
        $userAddress->delete();
        return UserAddressResource::make($userAddress);
    }
}
