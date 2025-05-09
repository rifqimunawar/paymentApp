<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('parameters')->delete();
        
        \DB::table('parameters')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama_rt' => 'Pak Haji Umuh Mukhtar',
                'biaya_pam' => 5000,
                'denda_ronda' => 10000,
                'latitude_ronda' => '-6.7199244',
                'longitude_ronda' => '108.5522648',
                'jam_awal_ronda' => '20:00',
                'created_by' => 'unknown',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => NULL,
                'updated_at' => '2025-04-21 11:58:10',
            ),
        ));
        
        
    }
}