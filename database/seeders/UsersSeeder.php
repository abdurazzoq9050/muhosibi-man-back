<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username'=>'AlovesZ',
                'email'=>'alovesz@gmail.com',
                'phone'=>'992928369050',
                'password'=>'0000',
                'code_phrase'=>json_encode(['ich','liebe','dich']),
                'status'=>1,
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }

    }
}
