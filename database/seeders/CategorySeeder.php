<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $rolesData = [
            ['name' => 'motor', 'price' => '10000'],
            ['name' => 'mobil', 'price' => '30000'],
            ['name' => 'truck', 'price' => '50000'],
        ];

        DB::table('categories')->insert($rolesData);
    }
}