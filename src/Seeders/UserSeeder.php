<?php

namespace Dangkhoa\Plugins\User\src\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userTable = DB::table('users');

        if ($userTable->count() < 1) {
            $userTable->insert([
                'name' => 'khoa_nguyen',
                'email' => 'nguyentudangkhoa@gmail.com',
                'password' => Hash::make('Dangkhoa@1997'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if ($user = $userTable->where('email', 'nguyentudangkhoa@gmail.com')->first()) {
                DB::table('user_information')->insert([
                    'user_id' => $user->id,
                    'first_name' => 'khoa',
                    'last_name' => 'nguyen',
                    'address' => 'test',
                    'phone_number' => '0123456789',
                    'birthday' => '1997-06-03',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
