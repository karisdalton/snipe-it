<?php
namespace Tests\Unit;

use App\Models\Location;
use Tests\TestCase;

final class LocationTest extends TestCase
{
    public function testPassesIfNotSelfParent(): void
    {
        $a = Location::factory()->make([
            'name' => 'Test Location',
            'id' => 1,
            'parent_id' => Location::factory()->create(['id' => 10])->id,
        ]);

        $this->assertTrue($a->isValid());
    }

    public function testFailsIfSelfParent(): void
    {
        $a = Location::factory()->make([
            'name' => 'Test Location',
            'id' => 1,
            'parent_id' => 1,
        ]);

        $this->assertFalse($a->isValid());
        $this->assertStringContainsString(trans('validation.non_circular', ['attribute' => 'parent id']), $a->getErrors());
    }
}
