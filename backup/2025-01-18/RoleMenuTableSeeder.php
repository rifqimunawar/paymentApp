<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleMenuTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('role_menu')->delete();
        
        \DB::table('role_menu')->insert(array (
            0 => 
            array (
                'id' => 7,
                'role_id' => 3,
                'menu_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 10,
                'role_id' => 3,
                'menu_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 27,
                'role_id' => 2,
                'menu_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 28,
                'role_id' => 2,
                'menu_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 29,
                'role_id' => 2,
                'menu_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 30,
                'role_id' => 2,
                'menu_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 31,
                'role_id' => 2,
                'menu_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 32,
                'role_id' => 2,
                'menu_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 33,
                'role_id' => 2,
                'menu_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 34,
                'role_id' => 2,
                'menu_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 38,
                'role_id' => 2,
                'menu_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 41,
                'role_id' => 2,
                'menu_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 43,
                'role_id' => 2,
                'menu_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 44,
                'role_id' => 2,
                'menu_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 47,
                'role_id' => 2,
                'menu_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 48,
                'role_id' => 2,
                'menu_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 49,
                'role_id' => 2,
                'menu_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 50,
                'role_id' => 2,
                'menu_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 51,
                'role_id' => 2,
                'menu_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 52,
                'role_id' => 2,
                'menu_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 53,
                'role_id' => 2,
                'menu_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}