<?php

namespace Database\Factories;

use App\Enums\DeliveryTypeEnum;
use App\Enums\OrderStatusEnum;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Create a new user and retrieve its ID
        $user = User::factory()->create();
        $userId = $user->id;

        // Create a new user address and retrieve its ID
        $userAddress = UserAddress::factory()->create();
        $userAddressId = $userAddress->id;

        return [
            'amount' => $this->faker->randomFloat(2, 10, 100),
            'delivery_type' => $this->faker->randomElement(array_column(DeliveryTypeEnum::cases(), 'value')),
            'user_address_id' => $userAddressId,
            'user_id' => $userId,
        ];
    }
}
