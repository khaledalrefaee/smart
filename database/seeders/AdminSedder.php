<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->truncate();

        $admins = [
            [
                'name' => 'owner owner',
                'phone' => '0930000660',
                'email' => 'owner@gmail.com',
                'password' => Hash::make('123123'),
                'type' =>'owner',
            ],

            [
                'name' => 'admin admin',
                'phone' => '0962812838',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123123'),
                'type' =>'admin',
            ],
                     
        ];

        foreach ($admins as $admin) {

            Admin::create($admin);
        }
    }
}
