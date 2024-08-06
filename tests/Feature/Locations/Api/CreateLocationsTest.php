<?php

namespace Tests\Feature\Locations\Api;

use App\Models\Location;
use App\Models\User;
use Tests\TestCase;

final class CreateLocationsTest extends TestCase
{

    public function testRequiresPermissionToCreateLocation(): void
    {
        $this->actingAsForApi(User::factory()->create())
            ->postJson(route('api.departments.store'))
            ->assertForbidden();
    }

    public function testCannotCreateNewLocationsWithTheSameName(): void
    {
        $location = Location::factory()->create();
        $location2 = Location::factory()->create();

        $this->actingAsForApi(User::factory()->superuser()->create())
            ->patchJson(route('api.locations.update', $location2), [
                'name' => $location->name,
            ])
            ->assertOk()
            ->assertStatusMessageIs('error')
            ->assertStatus(200)
            ->json();


    }

    public function testUserCannotCreateLocationsThatAreTheirOwnParent(): void
    {
        $location = Location::factory()->create();

        $this->actingAsForApi(User::factory()->superuser()->create())
            ->patchJson(route('api.locations.update', $location), [
                'parent_id' => $location->id,
            ])
            ->assertOk()
            ->assertStatusMessageIs('error')
            ->assertJson([
                'messages' => [
                    'parent_id'    => ['The parent id must not create a circular reference.'],
                ],
            ])
            ->json();


    }

}
