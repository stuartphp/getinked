<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::insert([
            [//1
                'name'=>'Consumables',
                'parent_id' =>0,
                'slug' =>'consumables',
            ],
            [//2
                'name'=>'Inks',
                'parent_id' =>0,
                'slug' =>'inks',
            ],
            [
                'name'=>'Dynamic',
                'parent_id' =>2,
                'slug' =>'dynamic',
            ],
            [
                'name'=>'Eternal',
                'parent_id' =>2,
                'slug' =>'eternal',
            ],
            [
                'name'=>'Kuro Sumi',
                'parent_id' =>2,
                'slug' =>'kuro-sumi',
            ],
            [
                'name'=>'World Famouse',
                'parent_id' =>2,
                'slug' =>'world-famouse',
            ],
            [ //3
                'name'=>'Needles',
                'parent_id' =>0,
                'slug' =>'needles',
            ],
            [
                'name'=>'Round Liner',
                'parent_id' =>7,
                'slug' =>'round-liner',
            ],
            [
                'name'=>'Round Shader',
                'parent_id' =>7,
                'slug' =>'round-shader',
            ],
            [
                'name'=>'Flat Shaders',
                'parent_id' =>7,
                'slug' =>'flat-shaders',
            ],
            [
                'name'=>'Magnum',
                'parent_id' =>7,
                'slug' =>'magnum',
            ],
        ]);
    }
}
