<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'      => 'gema antika hariadi',
                'email'     => 'gemaantikahr@gmail.com',
                'password'  => bcrypt('gemaantikahr@gmail.com'),
            ]
        ];

        foreach($users as $user){
            $user = User::firstOrCreate([
                'email'     => $user['email']
            ],[
                'name'      => $user['name'],
                'password'  => $user['password'],
            ]);
        }
    }
}
