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
                'name' => 'Rifqi Munawar R.',
                'username' => 'admin',
                'warga_id' => NULL,
                'img' => 'profile_admin_1734787375.JPG',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$03MdGVNvxcw9WlnK2HE84u.lpIXNoa6NYnq4PLdlz34brz8V2.uae',
                'role_id' => 2,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => '2024-12-21 13:36:47',
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'munawar',
                'username' => 'munawar',
                'warga_id' => 9,
                'img' => 'profile.png',
                'email' => 'munawar@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$UbtQtopGrvwLPhaazhU/3OSXma1jsUfY2BTmdHgywlFKIryoEAM16',
                'role_id' => 3,
                'remember_token' => NULL,
                'created_at' => '2025-02-23 23:22:10',
                'updated_at' => '2025-02-23 23:22:10',
            ),
        ));
        
        
    }
}