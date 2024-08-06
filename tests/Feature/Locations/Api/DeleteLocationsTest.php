<?php

namespace Tests\Feature\Locations\Api;

use App\Models\Asset;
use App\Models\Location;
use App\Models\User;
use Tests\TestCase;

final class DeleteLocationsTest extends TestCase
{

    public function testErrorReturnedViaApiIfLocationDoesNotExist(): void
    {
        $this->actingAsForApi(User::factory()->superuser()->create())
            ->deleteJson(route('api.users.destroy', 'invalid-id'))
            ->assertOk()
            ->assertStatus(200)
            ->assertStatusMessageIs('error')
            ->json();
    }

    public function testErrorReturnedViaApiIfLocationIsAlreadyDeleted(): void
    {
        $location = Location::factory()->deletedLocation()->create();
        $this->actingAsForApi(User::factory()->superuser()->create())
            ->deleteJson(route('api.locations.destroy', $location->id))
            ->assertOk()
            ->assertStatus(200)
            ->assertStatusMessageIs('error')
            ->json();
    }

    public function testDisallowLocationDeletionViaApiIfStillHasPeople(): void
    {
        $location = Location::factory()->create();
        User::factory()->count(5)->create(['location_id' => $location->id]);

        $this->assertFalse($location->isDeletable());

        $this->actingAsForApi(User::factory()->superuser()->create())
            ->deleteJson(route('api.locations.destroy', $location->id))
            ->assertOk()
            ->assertStatus(200)
            ->assertStatusMessageIs('error')
            ->json();
    }

    public function testDisallowUserDeletionViaApiIfStillHasChildLocations(): void
    {
        $parent = Location::factory()->create();
        Location::factory()->count(5)->create(['parent_id' => $parent->id]);
        $this->assertFalse($parent->isDeletable());

        $this->actingAsForApi(User::factory()->superuser()->create())
            ->deleteJson(route('api.locations.destroy', $parent->id))
            ->assertOk()
            ->assertStatus(200)
            ->assertStatusMessageIs('error')
            ->json();
    }

    public function testDisallowUserDeletionViaApiIfStillHasAssetsAssigned(): void
    {
        $location = Location::factory()->create();
        Asset::factory()->count(5)->assignedToLocation($location)->create();

        $this->assertFalse($location->isDeletable());

        $this->actingAsForApi(User::factory()->superuser()->create())
            ->deleteJson(route('api.locations.destroy', $location->id))
            ->assertOk()
            ->assertStatus(200)
            ->assertStatusMessageIs('error')
            ->json();
    }

    public function testDisallowUserDeletionViaApiIfStillHasAssetsAsLocation(): void
    {
        $location = Location::factory()->create();
        Asset::factory()->count(5)->create(['location_id' => $location->id]);

        $this->assertFalse($location->isDeletable());

        $this->actingAsForApi(User::factory()->superuser()->create())
            ->deleteJson(route('api.locations.destroy', $location->id))
            ->assertOk()
            ->assertStatus(200)
            ->assertStatusMessageIs('error')
            ->json();
    }

}
