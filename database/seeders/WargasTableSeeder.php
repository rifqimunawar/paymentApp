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
                'telp' => '085151145097',
                'alamat' => 'D7 No. 11',
                'nik' => '3203210512010003',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Cianjur',
                'tgl_lahir' => '2001-11-05',
                'agama' => '1',
                'pendidikan' => '5',
                'pekerjaan' => '12',
                'status_perkawinan' => '2',
                'status_keluarga' => '1',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-17 11:30:04',
                'updated_at' => '2025-02-09 01:20:09',
            ),
            1 => 
            array (
                'id' => 3,
                'nama' => 'Udin Petot',
                'telp' => '085151145097',
                'alamat' => 'bandung',
                'nik' => '1278010404040004',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'Bandung',
                'tgl_lahir' => '2007-02-06',
                'agama' => '1',
                'pendidikan' => '5',
                'pekerjaan' => '12',
                'status_perkawinan' => '2',
                'status_keluarga' => '1',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 00:34:20',
                'updated_at' => '2025-01-21 00:34:20',
            ),
            2 => 
            array (
                'id' => 4,
                'nama' => 'Ronaldo',
                'telp' => '085151145097',
                'alamat' => 'portugal',
                'nik' => '1278010404040004',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'Bandung',
                'tgl_lahir' => '2007-02-06',
                'agama' => '1',
                'pendidikan' => '5',
                'pekerjaan' => '12',
                'status_perkawinan' => '2',
                'status_keluarga' => '1',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 00:38:58',
                'updated_at' => '2025-01-21 00:38:58',
            ),
            3 => 
            array (
                'id' => 5,
                'nama' => 'Leonel Messi',
                'telp' => '085151145097',
                'alamat' => 'argentina',
                'nik' => '1278010404040004',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'Bandung',
                'tgl_lahir' => '2007-02-06',
                'agama' => '1',
                'pendidikan' => '5',
                'pekerjaan' => '12',
                'status_perkawinan' => '2',
                'status_keluarga' => '1',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-01-21 00:39:18',
                'updated_at' => '2025-01-21 00:39:18',
            ),
            4 => 
            array (
                'id' => 6,
                'nama' => 'Antony El-Gasing',
                'telp' => '085151145097',
                'alamat' => 'Al hilal',
                'nik' => '3203210000000',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'Bandung',
                'tgl_lahir' => '2007-02-06',
                'agama' => '1',
                'pendidikan' => '5',
                'pekerjaan' => '12',
                'status_perkawinan' => '2',
                'status_keluarga' => '1',
                'created_by' => 'admin',
                'updated_by' => 'unknown',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-09 00:59:35',
                'updated_at' => '2025-02-09 00:59:35',
            ),
            5 => 
            array (
                'id' => 8,
                'nama' => 'Dilan',
                'telp' => '085151145097',
                'alamat' => 'Cirebon',
                'nik' => '1278010404040004',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Bandung',
                'tgl_lahir' => '2007-02-06',
                'agama' => '1',
                'pendidikan' => '3',
                'pekerjaan' => '12',
                'status_perkawinan' => '2',
                'status_keluarga' => '1',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-24 21:39:39',
                'updated_at' => '2025-03-08 17:18:18',
            ),
            6 => 
            array (
                'id' => 9,
                'nama' => 'Budi Santoso',
                'telp' => '081345678912',
                'alamat' => 'Bandung',
                'nik' => '3275010303030003',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Bandung',
                'tgl_lahir' => '1987-12-10',
                'agama' => '2',
                'pendidikan' => '4',
                'pekerjaan' => '10',
                'status_perkawinan' => '2',
                'status_keluarga' => '1',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-24 21:39:39',
                'updated_at' => '2025-03-08 17:18:33',
            ),
            7 => 
            array (
                'id' => 11,
                'nama' => 'Eko Prasetyo',
                'telp' => '081290876543',
                'alamat' => 'Yogyakarta',
                'nik' => '3471010505050005',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Yogyakarta',
                'tgl_lahir' => '1992-09-30',
                'agama' => '3',
                'pendidikan' => '2',
                'pekerjaan' => '10',
                'status_perkawinan' => '3',
                'status_keluarga' => '1',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-24 21:39:39',
                'updated_at' => '2025-03-08 17:19:32',
            ),
            8 => 
            array (
                'id' => 13,
                'nama' => 'Rudi Hartono',
                'telp' => '085678909876',
                'alamat' => 'Palembang',
                'nik' => '1671010707070007',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Palembang',
                'tgl_lahir' => '1985-06-12',
                'agama' => '2',
                'pendidikan' => '4',
                'pekerjaan' => '2',
                'status_perkawinan' => '2',
                'status_keluarga' => '1',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-02-24 21:39:39',
                'updated_at' => '2025-02-24 21:45:39',
            ),
            9 => 
            array (
                'id' => 18,
                'nama' => 'Ridho Alamsyah',
                'telp' => '+6289546919461',
                'alamat' => '24042 Madelyn Common
West Lucileside, UT 57818',
                'nik' => '3305002801976637',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Handtown',
                'tgl_lahir' => '1995-01-20',
                'agama' => '2',
                'pendidikan' => '7',
                'pekerjaan' => '11',
                'status_perkawinan' => '4',
                'status_keluarga' => '392281740',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            10 => 
            array (
                'id' => 20,
                'nama' => 'Rendi Prasetyo',
                'telp' => '+6287695385782',
                'alamat' => '5409 King Squares
East Charlie, TX 08483',
                'nik' => '9939370363220659',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Metaberg',
                'tgl_lahir' => '1997-11-17',
                'agama' => '1',
                'pendidikan' => '1',
                'pekerjaan' => '3',
                'status_perkawinan' => '4',
                'status_keluarga' => '607851197',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            11 => 
            array (
                'id' => 25,
                'nama' => 'Galih Saputra',
                'telp' => '+6289992528956',
                'alamat' => '57502 Stamm Corner Apt. 066
South Clarissa, AZ 70922',
                'nik' => '7693102711748997',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Emersonmouth',
                'tgl_lahir' => '1995-01-10',
                'agama' => '1',
                'pendidikan' => '3',
                'pekerjaan' => '20',
                'status_perkawinan' => '4',
                'status_keluarga' => '1996750721',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            12 => 
            array (
                'id' => 26,
                'nama' => 'Ayu Lestari',
                'telp' => '+6289864079231',
                'alamat' => '73597 Francisca Gardens Suite 914
Concepcionberg, DC 17980-4871',
                'nik' => '5176665966190955',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'North Idell',
                'tgl_lahir' => '1996-06-16',
                'agama' => '3',
                'pendidikan' => '7',
                'pekerjaan' => '14',
                'status_perkawinan' => '4',
                'status_keluarga' => '1566381873',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            13 => 
            array (
                'id' => 30,
                'nama' => 'Fikri Irawan',
                'telp' => '+6282844723091',
                'alamat' => '9974 Klocko Squares Suite 268
West Ocie, HI 37105',
                'nik' => '6305569549204242',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'Bergstromton',
                'tgl_lahir' => '2003-03-19',
                'agama' => '3',
                'pendidikan' => '5',
                'pekerjaan' => '9',
                'status_perkawinan' => '3',
                'status_keluarga' => '1102074069',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            14 => 
            array (
                'id' => 31,
                'nama' => 'Fajar Nugroho',
                'telp' => '+6289628114691',
                'alamat' => '706 Hoeger Crossroad Suite 238
Stammburgh, MS 44637-2817',
                'nik' => '6906598566985529',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'Delphineside',
                'tgl_lahir' => '1995-04-29',
                'agama' => '1',
                'pendidikan' => '3',
                'pekerjaan' => '2',
                'status_perkawinan' => '4',
                'status_keluarga' => '1757945306',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            15 => 
            array (
                'id' => 33,
                'nama' => 'Arif Rahman',
                'telp' => '+6286188918451',
                'alamat' => '7800 Leola Expressway Suite 383
Gerdashire, MD 49335-8640',
                'nik' => '7110536265940081',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'South Daishaside',
                'tgl_lahir' => '1991-09-22',
                'agama' => '2',
                'pendidikan' => '7',
                'pekerjaan' => '1',
                'status_perkawinan' => '3',
                'status_keluarga' => '258177767',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            16 => 
            array (
                'id' => 35,
                'nama' => 'Andi Wijaya',
                'telp' => '+6285732852933',
                'alamat' => '855 Jaclyn Well
Khalilview, SD 39553',
                'nik' => '0737180237207192',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Mafaldafort',
                'tgl_lahir' => '1999-11-05',
                'agama' => '4',
                'pendidikan' => '3',
                'pekerjaan' => '1',
                'status_perkawinan' => '3',
                'status_keluarga' => '1447320409',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            17 => 
            array (
                'id' => 36,
                'nama' => 'Wahyu Nugroho',
                'telp' => '+6287668335960',
                'alamat' => '83516 Dibbert Spring Apt. 374
Port Patience, NV 30764-9050',
                'nik' => '2596029144378623',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Kulasport',
                'tgl_lahir' => '1991-05-11',
                'agama' => '4',
                'pendidikan' => '7',
                'pekerjaan' => '6',
                'status_perkawinan' => '3',
                'status_keluarga' => '1017401284',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            18 => 
            array (
                'id' => 41,
                'nama' => 'Ari Wibowo',
                'telp' => '+6281917339338',
                'alamat' => '225 Lockman Ways Apt. 421
West Maraton, MO 37829',
                'nik' => '4944804813595146',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'O\'Reillyburgh',
                'tgl_lahir' => '1998-01-13',
                'agama' => '4',
                'pendidikan' => '2',
                'pekerjaan' => '5',
                'status_perkawinan' => '2',
                'status_keluarga' => '1758871616',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            19 => 
            array (
                'id' => 43,
                'nama' => 'Yoga Permana',
                'telp' => '+6287527496507',
                'alamat' => '69873 Weber Forest
Casperborough, AK 12737',
                'nik' => '3253975293187905',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'Lednerchester',
                'tgl_lahir' => '1993-10-12',
                'agama' => '2',
                'pendidikan' => '5',
                'pekerjaan' => '5',
                'status_perkawinan' => '1',
                'status_keluarga' => '1190961469',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            20 => 
            array (
                'id' => 44,
                'nama' => 'Fahmi Aditya',
                'telp' => '+6284274434219',
                'alamat' => '3934 Mitchel Track
Micaelaville, WA 93500',
                'nik' => '0669187709410091',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Gottliebborough',
                'tgl_lahir' => '1992-03-13',
                'agama' => '3',
                'pendidikan' => '3',
                'pekerjaan' => '17',
                'status_perkawinan' => '1',
                'status_keluarga' => '1007119827',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            21 => 
            array (
                'id' => 45,
                'nama' => 'Joko Prabowo',
                'telp' => '+6285292352216',
                'alamat' => '780 Joelle Track Apt. 106
North Sylvan, AL 18645-4882',
                'nik' => '7058564397475896',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Stokesside',
                'tgl_lahir' => '1994-03-13',
                'agama' => '2',
                'pendidikan' => '4',
                'pekerjaan' => '6',
                'status_perkawinan' => '1',
                'status_keluarga' => '353433076',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            22 => 
            array (
                'id' => 47,
                'nama' => 'Rian Firmansyah',
                'telp' => '+6283353227392',
                'alamat' => '49372 Torphy Alley Suite 776
Binsville, MD 60969',
                'nik' => '4671058914313854',
                'jk' => 'Perempuan',
                'kota_kelahiran' => 'Kittybury',
                'tgl_lahir' => '1997-12-24',
                'agama' => '4',
                'pendidikan' => '1',
                'pekerjaan' => '15',
                'status_perkawinan' => '2',
                'status_keluarga' => '941284692',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            23 => 
            array (
                'id' => 52,
                'nama' => 'Ricky Maulana',
                'telp' => '+6287052225174',
                'alamat' => '712 Clara Shoals
North Jenniefort, CT 11510-5208',
                'nik' => '9286932311466927',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Mauriceberg',
                'tgl_lahir' => '1994-07-15',
                'agama' => '3',
                'pendidikan' => '7',
                'pekerjaan' => '14',
                'status_perkawinan' => '2',
                'status_keluarga' => '1131241118',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            24 => 
            array (
                'id' => 53,
                'nama' => 'Hendra Gunawan',
                'telp' => '+6281956707428',
                'alamat' => '3855 Candido Terrace
Weimannfurt, IL 88227-6525',
                'nik' => '0856590345967958',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'Leviside',
                'tgl_lahir' => '1993-01-27',
                'agama' => '3',
                'pendidikan' => '7',
                'pekerjaan' => '14',
                'status_perkawinan' => '4',
                'status_keluarga' => '965408834',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            25 => 
            array (
                'id' => 54,
                'nama' => 'Dedi Kurniawan',
                'telp' => '+6288531163274',
                'alamat' => '19541 O\'Keefe Islands
Amostown, KY 06622',
                'nik' => '3675970664707760',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'West Janiceberg',
                'tgl_lahir' => '1999-03-14',
                'agama' => '3',
                'pendidikan' => '1',
                'pekerjaan' => '16',
                'status_perkawinan' => '4',
                'status_keluarga' => '349315856',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            26 => 
            array (
                'id' => 56,
                'nama' => 'Dimas Kurniawan',
                'telp' => '+6288572444032',
                'alamat' => '2691 Tina Stream Apt. 111
Spencerfurt, KS 13558-5504',
                'nik' => '7056892523209932',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'South Marty',
                'tgl_lahir' => '1998-12-12',
                'agama' => '4',
                'pendidikan' => '1',
                'pekerjaan' => '12',
                'status_perkawinan' => '3',
                'status_keluarga' => '1853609916',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
            27 => 
            array (
                'id' => 59,
                'nama' => 'Ferry Anugrah',
                'telp' => '+6285110846508',
                'alamat' => '5563 Okuneva Fork
South Bernitamouth, NE 42956-3830',
                'nik' => '8222137750402285',
                'jk' => 'Laki-laki',
                'kota_kelahiran' => 'New German',
                'tgl_lahir' => '1997-02-24',
                'agama' => '3',
                'pendidikan' => '3',
                'pekerjaan' => '1',
                'status_perkawinan' => '2',
                'status_keluarga' => '2096736164',
                'created_by' => 'admin',
                'updated_by' => 'admin',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-04-11 14:30:13',
                'updated_at' => '2025-04-11 14:30:13',
            ),
        ));
        
        
    }
}