<?php

namespace App\Models\Categories;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    const UPDATED_AT = null;
    const CREATED_AT = null;
    protected $fillable = [
        'main_category'
    ];

    // ↓はメインカテゴリーが一つ　その中の複数のサブカテゴリーだから多対多となる
    public function subCategories(){
        // リレーションの定義
        return $this->hasMany(SubCategory::class);
    }

}