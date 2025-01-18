<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WargasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('wargas')->delete();
        
        \DB::table('wargas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'Rifqi Munawar Ridwan',
                'telp' => NULL,
                'alamat' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-17 11:30:04',
                'updated_at' => '2025-01-17 11:30:04',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'Munawar',
                'telp' => NULL,
                'alamat' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 19:53:46',
                'updated_at' => '2025-01-18 19:53:46',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'Ridwan',
                'telp' => NULL,
                'alamat' => NULL,
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-18 19:54:52',
                'updated_at' => '2025-01-18 19:54:52',
            ),
        ));
        
        
    }
}