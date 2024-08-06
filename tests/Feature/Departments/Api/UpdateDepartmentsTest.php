<?php

namespace Tests\Feature\Departments\Api;

use App\Models\Department;
use App\Models\Category;
use App\Models\User;
use Tests\TestCase;

final class UpdateDepartmentsTest extends TestCase
{

    public function testRequiresPermissionToEditDepartment(): void
    {
        $department = Department::factory()->create();
        $this->actingAsForApi(User::factory()->create())
            ->patchJson(route('api.departments.update', $department))
            ->assertForbidden();
    }

    public function testCanUpdateDepartmentViaPatch(): void
    {
        $department = Department::factory()->create();

        $this->actingAsForApi(User::factory()->superuser()->create())
            ->patchJson(route('api.departments.update', $department), [
                'name' => 'Test Department',
            ])
            ->assertOk()
            ->assertStatusMessageIs('success')
            ->assertStatus(200)
            ->json();

        $department->refresh();
        $this->assertEquals('Test Department', $department->name, 'Name was not updated');

    }



}
