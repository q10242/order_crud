<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_orders()
    {
        $orderItem = OrderItem::factory()->create();
        $order = Order::factory()->create(['order_item_id' => $orderItem->id]);

        $response = $this->get('/orders');

        $response->assertStatus(200);
        $response->assertSee($order->status);
    }

    /** @test */
    public function it_can_create_order()
    {
        $user = User::factory()->create();
        $orderItem = OrderItem::factory()->create();
        
        $orderData = [
            'user_id' => $user->id,
            'order_item_id' => $orderItem->id,
            'status' => 'pending',
            'price' => 100.00,
            'payment_method' => 'credit card',
            'payment_status' => 'paid',
        ];

        $response = $this->post('/orders', $orderData);

        $response->assertRedirect('/orders');
        $this->assertDatabaseHas('orders', $orderData);
    }

    /** @test */
    public function it_can_show_order()
    {
        $orderItem = OrderItem::factory()->create();
        $order = Order::factory()->create(['order_item_id' => $orderItem->id]);

        $response = $this->get("/orders/{$order->id}");

        $response->assertStatus(200);
        $response->assertSee($order->status);
    }

    /** @test */
    public function it_can_update_order()
    {
        $orderItem = OrderItem::factory()->create();
        $order = Order::factory()->create(['order_item_id' => $orderItem->id]);

        $updatedData = [
            'user_id' => $order->user_id,
            'order_item_id' => $orderItem->id,
            'status' => 'completed',
            'price' => 200.00,
            'payment_method' => 'paypal',
            'payment_status' => 'unpaid',
        ];

        $response = $this->put("/orders/{$order->id}", $updatedData);

        $response->assertRedirect('/orders');
        $this->assertDatabaseHas('orders', $updatedData);
    }

    /** @test */
    public function it_can_delete_order()
    {
        $orderItem = OrderItem::factory()->create();
        $order = Order::factory()->create(['order_item_id' => $orderItem->id]);

        $response = $this->delete("/orders/{$order->id}");

        $response->assertRedirect('/orders');
        $this->assertDatabaseMissing('orders', ['id' => $order->id]);
    }
}
