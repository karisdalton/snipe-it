<?php

namespace Tests\Feature\Departments\Ui;

use App\Models\Department;
use App\Models\Category;
use App\Models\User;
use Tests\TestCase;

final class UpdateDepartmentsTest extends TestCase
{
    public function testPermissionRequiredToStoreDepartment(): void
    {
        $this->actingAs(User::factory()->create())
            ->post(route('departments.store'), [
                'name' => 'Test Department',
            ])
            ->assertStatus(403)
            ->assertForbidden();
    }


    public function testUserCanEditDepartments(): void
    {
        $department = Department::factory()->create(['name' => 'Test Department']);
        $this->assertTrue(Department::where('name', 'Test Department')->exists());

        $response = $this->actingAs(User::factory()->superuser()->create())
            ->put(route('departments.update', ['department' => $department]), [
                'name' => 'Test Department Edited',
            ])
            ->assertStatus(302)
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('departments.index'));

        $this->followRedirects($response)->assertSee('Success');
        $this->assertTrue(Department::where('name', 'Test Department Edited')->exists());

    }



}
