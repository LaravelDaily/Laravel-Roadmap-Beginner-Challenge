<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$pj49z3aXA7ITVKCGA29j4OGpXlSRuXPPgHP7CRIdQdh09TeanL4Qy',
                'remember_token' => NULL,
                'created_at' => '2021-10-15 14:41:15',
                'updated_at' => '2021-10-15 14:41:15',
            ),
        ));
        
        
    }
}