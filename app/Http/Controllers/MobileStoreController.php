<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoreResource;
use App\Models\Store;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Services\StoreService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class MobileStoreController extends Controller
{
    public function __invoke()
    {
        $data = Store::select("product_id", DB::raw('MAX(expiry_date) as expiry_date'))
            ->groupBy('product_id')
            ->get();

        $productIds = collect($data)->pluck('product_id')->toArray();
        $expiryDates = collect($data)->pluck('expiry_date')->toArray();

        $stores = Store::whereIn('product_id', $productIds)
            ->whereIn('expiry_date', $expiryDates)
            ->paginate(request()->get('perPage', 10));

        foreach ($stores as $store) {
            $selectedStores = $stores->where('product_id', $store->product_id);
            if ($selectedStores->count() > 1) {
                $minId = $selectedStores->min('id');
                $stores = $stores->reject(fn($item) => $selectedStores->contains('id', $item->id) && $item->id !== $minId);
            }
        }

        return $stores;

    }
}
