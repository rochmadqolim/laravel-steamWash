<?php

namespace Database\Seeders;

use App\Models\Login;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();
    
        $userData = [
            [
                'fullname' => 'user pertama',
                'username' => 'user111',
                'password' => Hash::make('123'),
            ],
            [
                'fullname' => 'user kedua',
                'username' => 'user222',
                'password' => Hash::make('123'),
            ],
        ];
    
        DB::table('logins')->insert($userData);
    }
}