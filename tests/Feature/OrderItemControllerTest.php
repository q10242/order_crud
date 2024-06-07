<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\OrderItem;

class OrderItemControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_display_order_items()
    {
        $orderItem = OrderItem::factory()->create();

        $response = $this->get('/orderItems');

        $response->assertStatus(200);
        $response->assertSee($orderItem->product_name);
    }

    /** @test */
    public function it_can_create_order_item()
    {
        $orderItemData = [
            'product_name' => 'Test Product',
            'quantity' => 5,
            'price' => 100.00,
        ];

        $response = $this->post('/orderItems', $orderItemData);

        $response->assertRedirect('/orderItems');
        $this->assertDatabaseHas('order_items', $orderItemData);
    }

    /** @test */
    public function it_can_show_order_item()
    {
        $orderItem = OrderItem::factory()->create();

        $response = $this->get("/orderItems/{$orderItem->id}");

        $response->assertStatus(200);
        $response->assertSee($orderItem->product_name);
    }

    /** @test */
    public function it_can_update_order_item()
    {
        $orderItem = OrderItem::factory()->create();

        $updatedData = [
            'product_name' => 'Updated Product',
            'quantity' => 10,
            'price' => 150.00,
        ];

        $response = $this->put("/orderItems/{$orderItem->id}", $updatedData);

        $response->assertRedirect('/orderItems');
        $this->assertDatabaseHas('order_items', $updatedData);
    }

    /** @test */
    public function it_can_delete_order_item()
    {
        $orderItem = OrderItem::factory()->create();

        $response = $this->delete("/orderItems/{$orderItem->id}");

        $response->assertRedirect('/orderItems');
        $this->assertDatabaseMissing('order_items', ['id' => $orderItem->id]);
    }
}
