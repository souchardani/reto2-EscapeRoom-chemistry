<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new user();
        $user->name="admin";
        $user->email="admin@admin.com";
        $user->password=Hash::make("Escaperoomg1");
        $user->save();
    }
}
