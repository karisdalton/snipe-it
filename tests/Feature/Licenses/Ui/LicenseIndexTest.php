<?php

namespace Tests\Feature\Licenses\Ui;

use App\Models\User;
use Tests\TestCase;

final class LicenseIndexTest extends TestCase
{
    public function testPermissionRequiredToViewLicenseList(): void
    {
        $this->actingAs(User::factory()->create())
            ->get(route('licenses.index'))
            ->assertForbidden();
    }

    public function testUserCanListLicenses(): void
    {
        $this->actingAs(User::factory()->superuser()->create())
            ->get(route('licenses.index'))
            ->assertOk();
    }
}
