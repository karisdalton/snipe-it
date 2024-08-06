<?php

namespace Tests\Feature\Checkouts\Api;

use App\Models\Accessory;
use App\Models\Actionlog;
use App\Models\User;
use App\Notifications\CheckoutAccessoryNotification;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

final class AccessoryCheckoutTest extends TestCase
{
    public function testCheckingOutAccessoryRequiresCorrectPermission(): void
    {
        $this->actingAsForApi(User::factory()->create())
            ->postJson(route('api.accessories.checkout', Accessory::factory()->create()))
            ->assertForbidden();
    }

    public function testValidationWhenCheckingOutAccessory(): void
    {
        $this->actingAsForApi(User::factory()->checkoutAccessories()->create())
            ->postJson(route('api.accessories.checkout', Accessory::factory()->create()), [
                // missing assigned_user, assigned_location, assigned_asset
            ])
            ->assertStatusMessageIs('error');
    }

    public function testAccessoryMustBeAvailableWhenCheckingOut(): void
    {
        $this->actingAsForApi(User::factory()->checkoutAccessories()->create())
            ->postJson(route('api.accessories.checkout', Accessory::factory()->withoutItemsRemaining()->create()), [
                'assigned_user' => User::factory()->create()->id,
                'checkout_to_type' => 'user'
            ])
            ->assertOk()
            ->assertStatusMessageIs('error')
            ->assertJson(
                [
                'status' => 'error',
                'messages' =>
                    [
                        'checkout_qty' =>
                            [
                                trans_choice('admin/accessories/message.checkout.checkout_qty.lte', 0,
                                    [
                                        'number_currently_remaining' => 0,
                                        'checkout_qty' => 1,
                                        'number_remaining_after_checkout' => 0
                                    ])
                            ],

                    ],
                    'payload' => null,
                ])
            ->assertStatus(200)
            ->json();
    }

    public function testAccessoryCanBeCheckedOutWithoutQty(): void
    {
        $accessory = Accessory::factory()->create();
        $user = User::factory()->create();
        $admin = User::factory()->checkoutAccessories()->create();

        $this->actingAsForApi($admin)
            ->postJson(route('api.accessories.checkout', $accessory), [
                'assigned_user' => $user->id,
                'checkout_to_type' => 'user'
            ])
            ->assertOk()
            ->assertStatusMessageIs('success')
            ->assertStatus(200)
            ->assertJson(['messages' =>  trans('admin/accessories/message.checkout.success')])
            ->json();

        $this->assertTrue($accessory->checkouts()->where('assigned_type', User::class)->where('assigned_to', $user->id)->count() > 0);

        $this->assertEquals(
            1,
            Actionlog::where([
                'action_type' => 'checkout',
                'target_id' => $user->id,
                'target_type' => User::class,
                'item_id' => $accessory->id,
                'item_type' => Accessory::class,
                'user_id' => $admin->id,
            ])->count(),'Log entry either does not exist or there are more than expected'
        );
    }

    public function testAccessoryCanBeCheckedOutWithQty(): void
    {
        $accessory = Accessory::factory()->create(['qty' => 20]);
        $user = User::factory()->create();
        $admin = User::factory()->checkoutAccessories()->create();

        $this->actingAsForApi($admin)
            ->postJson(route('api.accessories.checkout', $accessory), [
                'assigned_user' => $user->id,
                'checkout_to_type' => 'user',
                'checkout_qty' => 2,
            ])
            ->assertOk()
            ->assertStatusMessageIs('success')
            ->assertStatus(200)
            ->assertJson(['messages' =>  trans('admin/accessories/message.checkout.success')])
            ->json();

        $this->assertTrue($accessory->checkouts()->where('assigned_type', User::class)->where('assigned_to', $user->id)->count() > 0);

        $this->assertEquals(
            1,
            Actionlog::where([
                'action_type' => 'checkout',
                'target_id' => $user->id,
                'target_type' => User::class,
                'item_id' => $accessory->id,
                'item_type' => Accessory::class,
                'user_id' => $admin->id,
            ])->count(),
            'Log entry either does not exist or there are more than expected'
        );
    }

    public function testAccessoryCannotBeCheckedOutToInvalidUser(): void
    {
        $accessory = Accessory::factory()->create();
        $user = User::factory()->create();

        $this->actingAsForApi(User::factory()->checkoutAccessories()->create())
            ->postJson(route('api.accessories.checkout', $accessory), [
                'assigned_user' => 'invalid-user-id',
                'checkout_to_type' => 'user',
                'note' => 'oh hi there',
            ])
            ->assertOk()
            ->assertStatusMessageIs('error')
            ->assertStatus(200)
            ->json();

            $this->assertFalse($accessory->checkouts()->where('assigned_type', User::class)->where('assigned_to', $user->id)->count() > 0);
    }

    public function testUserSentNotificationUponCheckout(): void
    {
        Notification::fake();

        $accessory = Accessory::factory()->requiringAcceptance()->create();
        $user = User::factory()->create();

        $this->actingAsForApi(User::factory()->checkoutAccessories()->create())
            ->postJson(route('api.accessories.checkout', $accessory), [
                'assigned_user' => $user->id,
                'checkout_to_type' => 'user',
            ]);

        Notification::assertSentTo($user, CheckoutAccessoryNotification::class);
    }

    public function testActionLogCreatedUponCheckout(): void
    {
        $accessory = Accessory::factory()->create();
        $actor = User::factory()->checkoutAccessories()->create();
        $user = User::factory()->create();

        $this->actingAsForApi($actor)
            ->postJson(route('api.accessories.checkout', $accessory), [
                'assigned_user' => $user->id,
                'checkout_to_type' => 'user',
                'note' => 'oh hi there',
            ]);

        $this->assertEquals(
            1,
            Actionlog::where([
                'action_type' => 'checkout',
                'target_id' => $user->id,
                'target_type' => User::class,
                'item_id' => $accessory->id,
                'item_type' => Accessory::class,
                'user_id' => $actor->id,
                'note' => 'oh hi there',
            ])->count(),
            'Log entry either does not exist or there are more than expected'
        );
    }
}
