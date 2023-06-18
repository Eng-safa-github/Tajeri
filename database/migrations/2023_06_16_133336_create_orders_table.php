<?php

use App\Enums\DeliveryTypeEnum;
use App\Enums\OrderStatusEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount');
            $table->enum("status", array_column(OrderStatusEnum::cases(), 'value'));
            $table->enum("delivery_type", array_column(DeliveryTypeEnum::cases(), 'value'));
            $table->foreignId('user_address_id')->constrained('user_addresses')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
