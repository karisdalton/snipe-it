<?php
namespace Tests\Unit;

use App\Models\Asset;
use App\Models\Category;
use App\Models\AssetModel;
use Tests\TestCase;

final class AssetModelTest extends TestCase
{
    public function testAnAssetModelContainsAssets(): void
    {
        $category = Category::factory()->create([
            'category_type' => 'asset'
            ]);
        $model = AssetModel::factory()->create([
            'category_id' => $category->id,
        ]);
    
        $asset = Asset::factory()->create([
                    'model_id' => $model->id
                ]);
        $this->assertEquals(1, $model->assets()->count());
    }
}
