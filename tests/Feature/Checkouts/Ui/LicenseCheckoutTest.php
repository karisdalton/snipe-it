<?php

namespace Tests\Feature\Checkouts\Ui;

use App\Models\Asset;
use App\Models\License;
use App\Models\LicenseSeat;
use App\Models\User;
use Tests\TestCase;

final class LicenseCheckoutTest extends TestCase
{
    public function testNotesAreStoredInActionLogOnCheckoutToAsset(): void
    {
        $admin = User::factory()->superuser()->create();
        $asset = Asset::factory()->create();
        $licenseSeat = LicenseSeat::factory()->create();

        $this->actingAs($admin)
            ->post("/licenses/{$licenseSeat->license->id}/checkout", [
                'checkout_to_type' => 'asset',
                'assigned_to' => null,
                'asset_id' => $asset->id,
                'notes' => 'oh hi there',
            ]);

        $this->assertDatabaseHas('action_logs', [
            'action_type' => 'checkout',
            'target_id' => $asset->id,
            'target_type' => Asset::class,
            'item_id' => $licenseSeat->license->id,
            'item_type' => License::class,
            'note' => 'oh hi there',
        ]);
    }

    public function testNotesAreStoredInActionLogOnCheckoutToUser(): void
    {
        $admin = User::factory()->superuser()->create();
        $licenseSeat = LicenseSeat::factory()->create();

        $this->actingAs($admin)
            ->post("/licenses/{$licenseSeat->license->id}/checkout", [
                'checkout_to_type' => 'user',
                'assigned_to' => $admin->id,
                'asset_id' => null,
                'notes' => 'oh hi there',
            ]);

        $this->assertDatabaseHas('action_logs', [
            'action_type' => 'checkout',
            'target_id' => $admin->id,
            'target_type' => User::class,
            'item_id' => $licenseSeat->license->id,
            'item_type' => License::class,
            'note' => 'oh hi there',
        ]);
    }

    public function testLicenseCheckoutPagePostIsRedirectedIfRedirectSelectionIsIndex(): void
    {
        $license = License::factory()->create();

        $this->actingAs(User::factory()->admin()->create())
            ->from(route('licenses.checkout', ['licenseId' => $license->id]))
            ->post(route('licenses.checkout', ['licenseId' => $license->id]), [
                'assigned_to' =>  User::factory()->create()->id,
                'redirect_option' => 'index',
                'assigned_qty' => 1,
            ])
            ->assertStatus(302)
            ->assertRedirect(route('licenses.index'));
    }

    public function testLicenseCheckoutPagePostIsRedirectedIfRedirectSelectionIsItem(): void
    {
        $license = License::factory()->create();

        $this->actingAs(User::factory()->admin()->create())
            ->from(route('licenses.checkout', ['licenseId' => $license->id]))
            ->post(route('licenses.checkout' , ['licenseId' => $license->id]), [
                'assigned_to' =>  User::factory()->create()->id,
                'redirect_option' => 'item',
            ])
            ->assertStatus(302)
            ->assertRedirect(route('licenses.show', ['license' => $license->id]));
    }

    public function testLicenseCheckoutPagePostIsRedirectedIfRedirectSelectionIsUserTarget(): void
    {
        $user = User::factory()->create();
        $license = License::factory()->create();

        $this->actingAs(User::factory()->admin()->create())
            ->from(route('licenses.checkout', ['licenseId' => $license->id]))
            ->post(route('licenses.checkout' , $license), [
                'assigned_to' =>  $user->id,
                'redirect_option' => 'target',
            ])
            ->assertStatus(302)
            ->assertRedirect(route('users.show', ['user' => $user->id]));
    }
    public function testLicenseCheckoutPagePostIsRedirectedIfRedirectSelectionIsAssetTarget(): void
    {
        $asset = Asset::factory()->create();
        $license = License::factory()->create();

        $this->actingAs(User::factory()->admin()->create())
            ->from(route('licenses.checkout', ['licenseId' => $license->id]))
            ->post(route('licenses.checkout' , $license), [
                'asset_id' =>  $asset->id,
                'redirect_option' => 'target',
            ])
            ->assertStatus(302)
            ->assertRedirect(route('hardware.show', ['hardware' => $asset->id]));
    }
}
