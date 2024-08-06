<?php
namespace Tests\Unit\Models\Company;

use App\Models\Company;
use App\Models\User;
use Tests\TestCase;

final class CompanyTest extends TestCase
{
    public function testACompanyCanHaveUsers(): void
    {
        $company = Company::factory()->create();
        $user = User::factory()
                ->create(
                    [
                        'company_id'=> $company->id
                    ]
        );

        $this->assertCount(1, $company->users);
    }
}
