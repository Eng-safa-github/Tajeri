<?php

namespace App\Http\Controllers;

use App\Enums\PermissionEnum;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Http\Requests\UpdateOrderRequest;
use App\Services\OrderService;
use Yajra\DataTables\DataTables;

class OrderDashboardController extends Controller
{
    public function __construct(public OrderService $orderService)
    {
//        $this->middleware(["permission:" . PermissionEnum::SHOW_ORDERS->value])->only(['index', 'show','update','destroy']);
    }

    public function index()
    {
        $model = Order::orderBy('id','DESC')->with(['user','orderStore','userAddress']);
        return DataTables::of($model)->toJson();
    }

    public function show(Order $order)
    {
        return OrderResource::make($order->load(['user','orderStore','userAddress','orderStore.store','orderStore.store.product']));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order = $this->orderService->update($request->validated(), $order);
        return OrderResource::make($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->noContent();
    }
}
