<?php

namespace Tests\Feature\Consumables\Ui;

use App\Models\AssetModel;
use App\Models\Category;
use App\Models\License;
use App\Models\Depreciation;
use App\Models\User;
use Tests\TestCase;

final class CreateLicenseTest extends TestCase
{
    public function testPermissionRequiredToViewLicense(): void
    {
        $license = License::factory()->create();
        $this->actingAs(User::factory()->create())
            ->get(route('licenses.create', $license))
            ->assertForbidden();
    }



    public function testLicenseWithoutPurchaseDateFailsValidation(): void
    {
        $response = $this->actingAs(User::factory()->superuser()->create())
            ->from(route('licenses.create'))
            ->post(route('licenses.store'), [
                'name' => 'Test Invalid License',
                'seats' => '10',
                'category_id' => Category::factory()->forLicenses()->create()->id,
                'depreciation_id' => Depreciation::factory()->create()->id
            ]);
        $response->assertStatus(302);
        $response->assertRedirect(route('licenses.create'));
        $response->assertInvalid(['purchase_date']);
        $response->assertSessionHasErrors(['purchase_date']);
        $this->followRedirects($response)->assertSee(trans('general.error'));
        $this->assertFalse(AssetModel::where('name', 'Test Invalid License')->exists());

    }
}
