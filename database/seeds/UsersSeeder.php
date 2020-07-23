<?php

use Illuminate\Database\Seeder;
use App\User as User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password'=> Hash::make('123456789'),
                'role_id' => 1
            ],
            [
                'name' => 'Editor',
                'email' => 'editor@editor.com',
                'password'=> Hash::make('123456789'),
                'role_id' => 2
            ],
            [
                'name' => 'Regular',
                'email' => 'regular@regular.com',
                'password'=> Hash::make('123456789'),
                'role_id' => 3
            ]
        ]);
    }
}
