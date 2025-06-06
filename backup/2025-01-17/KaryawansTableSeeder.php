<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KaryawansTableSeeder extends Seeder
{

  /**
   * Auto generated seed file
   *
   * @return void
   */
  public function run()
  {


    \DB::table('karyawans')->delete();

    \DB::table('karyawans')->insert(array(
      0 =>
        array(
          'id' => 1,
          'nik' => '0999999',
          'nama_lengkap' => 'Saepudiin',
          'posisi_id' => 1,
          'jenis_kendaraan_id' => 2,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'admin',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:12:04',
          'updated_at' => '2024-12-22 04:53:13',
        ),
      1 =>
        array(
          'id' => 2,
          'nik' => '90909090',
          'nama_lengkap' => 'Udin Petot',
          'posisi_id' => 3,
          'jenis_kendaraan_id' => 2,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:12:49',
          'updated_at' => '2024-12-22 04:12:49',
        ),
      2 =>
        array(
          'id' => 3,
          'nik' => '1234567',
          'nama_lengkap' => 'Rina Santika',
          'posisi_id' => 2,
          'jenis_kendaraan_id' => 1,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'admin',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:13:15',
          'updated_at' => '2024-12-22 04:13:15',
        ),
      3 =>
        array(
          'id' => 4,
          'nik' => '2345678',
          'nama_lengkap' => 'Joko Prasetyo',
          'posisi_id' => 4,
          'jenis_kendaraan_id' => 3,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'admin',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:14:00',
          'updated_at' => '2024-12-22 04:14:00',
        ),
      4 =>
        array(
          'id' => 5,
          'nik' => '3456789',
          'nama_lengkap' => 'Tari Setiani',
          'posisi_id' => 5,
          'jenis_kendaraan_id' => 2,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:14:20',
          'updated_at' => '2024-12-22 04:14:20',
        ),
      5 =>
        array(
          'id' => 6,
          'nik' => '4567890',
          'nama_lengkap' => 'Budi Hartanto',
          'posisi_id' => 6,
          'jenis_kendaraan_id' => 1,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:14:30',
          'updated_at' => '2024-12-22 04:14:30',
        ),
      6 =>
        array(
          'id' => 7,
          'nik' => '5678901',
          'nama_lengkap' => 'Dewi Sari',
          'posisi_id' => 7,
          'jenis_kendaraan_id' => 4,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'admin',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:14:40',
          'updated_at' => '2024-12-22 04:14:40',
        ),
      7 =>
        array(
          'id' => 8,
          'nik' => '6789012',
          'nama_lengkap' => 'Andi Prabowo',
          'posisi_id' => 8,
          'jenis_kendaraan_id' => 5,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:14:50',
          'updated_at' => '2024-12-22 04:14:50',
        ),
      8 =>
        array(
          'id' => 9,
          'nik' => '7890123',
          'nama_lengkap' => 'Tono Prasetya',
          'posisi_id' => 9,
          'jenis_kendaraan_id' => 3,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'admin',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:15:00',
          'updated_at' => '2024-12-22 04:15:00',
        ),
      9 =>
        array(
          'id' => 10,
          'nik' => '8901234',
          'nama_lengkap' => 'Siti Maemunah',
          'posisi_id' => 10,
          'jenis_kendaraan_id' => 6,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:15:10',
          'updated_at' => '2024-12-22 04:15:10',
        ),
      10 =>
        array(
          'id' => 11,
          'nik' => '9012345',
          'nama_lengkap' => 'Rudi Arifin',
          'posisi_id' => 2,
          'jenis_kendaraan_id' => 7,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:15:20',
          'updated_at' => '2024-12-22 04:15:20',
        ),
      11 =>
        array(
          'id' => 12,
          'nik' => '0123456',
          'nama_lengkap' => 'Siti Nurhaliza',
          'posisi_id' => 3,
          'jenis_kendaraan_id' => 4,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'admin',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:15:30',
          'updated_at' => '2024-12-22 04:15:30',
        ),
      12 =>
        array(
          'id' => 13,
          'nik' => '1234567',
          'nama_lengkap' => 'Faris Hidayat',
          'posisi_id' => 4,
          'jenis_kendaraan_id' => 5,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:15:40',
          'updated_at' => '2024-12-22 04:15:40',
        ),
      13 =>
        array(
          'id' => 14,
          'nik' => '2345678',
          'nama_lengkap' => 'Martha Lestari',
          'posisi_id' => 5,
          'jenis_kendaraan_id' => 1,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:15:50',
          'updated_at' => '2024-12-22 04:15:50',
        ),
      14 =>
        array(
          'id' => 15,
          'nik' => '3456789',
          'nama_lengkap' => 'Rudi Soedaryanto',
          'posisi_id' => 6,
          'jenis_kendaraan_id' => 6,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:16:00',
          'updated_at' => '2024-12-22 04:16:00',
        ),
      15 =>
        array(
          'id' => 16,
          'nik' => '4567890',
          'nama_lengkap' => 'Wahyu Nugroho',
          'posisi_id' => 7,
          'jenis_kendaraan_id' => 2,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:16:10',
          'updated_at' => '2024-12-22 04:16:10',
        ),
      16 =>
        array(
          'id' => 17,
          'nik' => '5678901',
          'nama_lengkap' => 'Indah Wahyuni',
          'posisi_id' => 8,
          'jenis_kendaraan_id' => 3,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:16:20',
          'updated_at' => '2024-12-22 04:16:20',
        ),
      17 =>
        array(
          'id' => 18,
          'nik' => '6789012',
          'nama_lengkap' => 'Mira Sari',
          'posisi_id' => 9,
          'jenis_kendaraan_id' => 7,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:16:30',
          'updated_at' => '2024-12-22 04:16:30',
        ),
      18 =>
        array(
          'id' => 19,
          'nik' => '7890123',
          'nama_lengkap' => 'Ari Setiawan',
          'posisi_id' => 10,
          'jenis_kendaraan_id' => 1,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'admin',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:16:40',
          'updated_at' => '2024-12-22 04:16:40',
        ),
      19 =>
        array(
          'id' => 20,
          'nik' => '8901234',
          'nama_lengkap' => 'Rina Alifah',
          'posisi_id' => 2,
          'jenis_kendaraan_id' => 3,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:16:50',
          'updated_at' => '2024-12-22 04:16:50',
        ),
      20 =>
        array(
          'id' => 21,
          'nik' => '9012345',
          'nama_lengkap' => 'Ayu Kartika',
          'posisi_id' => 3,
          'jenis_kendaraan_id' => 4,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:17:00',
          'updated_at' => '2024-12-22 04:17:00',
        ),
      21 =>
        array(
          'id' => 22,
          'nik' => '0123456',
          'nama_lengkap' => 'Bima Setiawan',
          'posisi_id' => 4,
          'jenis_kendaraan_id' => 5,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:17:10',
          'updated_at' => '2024-12-22 04:17:10',
        ),
      22 =>
        array(
          'id' => 23,
          'nik' => '1234567',
          'nama_lengkap' => 'Fajar Nugroho',
          'posisi_id' => 5,
          'jenis_kendaraan_id' => 6,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:17:20',
          'updated_at' => '2024-12-22 04:17:20',
        ),
      23 =>
        array(
          'id' => 24,
          'nik' => '2345678',
          'nama_lengkap' => 'Lina Sukmawati',
          'posisi_id' => 6,
          'jenis_kendaraan_id' => 7,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:17:30',
          'updated_at' => '2024-12-22 04:17:30',
        ),
      24 =>
        array(
          'id' => 25,
          'nik' => '3456789',
          'nama_lengkap' => 'Tina Amelia',
          'posisi_id' => 7,
          'jenis_kendaraan_id' => 3,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:17:40',
          'updated_at' => '2024-12-22 04:17:40',
        ),
      25 =>
        array(
          'id' => 26,
          'nik' => '4567890',
          'nama_lengkap' => 'Rino Widodo',
          'posisi_id' => 8,
          'jenis_kendaraan_id' => 1,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:17:50',
          'updated_at' => '2024-12-22 04:17:50',
        ),
      26 =>
        array(
          'id' => 27,
          'nik' => '5678901',
          'nama_lengkap' => 'Hendra Sugianto',
          'posisi_id' => 9,
          'jenis_kendaraan_id' => 2,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:18:00',
          'updated_at' => '2024-12-22 04:18:00',
        ),
      27 =>
        array(
          'id' => 28,
          'nik' => '6789012',
          'nama_lengkap' => 'Jihan Arum',
          'posisi_id' => 10,
          'jenis_kendaraan_id' => 4,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:18:10',
          'updated_at' => '2024-12-22 04:18:10',
        ),
      28 =>
        array(
          'id' => 29,
          'nik' => '7890123',
          'nama_lengkap' => 'Yanto Wijaya',
          'posisi_id' => 2,
          'jenis_kendaraan_id' => 5,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:18:20',
          'updated_at' => '2024-12-22 04:18:20',
        ),
      29 =>
        array(
          'id' => 30,
          'nik' => '8901234',
          'nama_lengkap' => 'Lili Kusuma',
          'posisi_id' => 3,
          'jenis_kendaraan_id' => 7,
          'merk_kendaraan' => NULL,
          'nopol_kendaraan' => NULL,
          'created_by' => 'admin',
          'modified_by' => 'unknown',
          'deleted_by' => NULL,
          'deleted_at' => NULL,
          'created_at' => '2024-12-22 04:18:30',
          'updated_at' => '2024-12-22 04:18:30',
        ),

    ));

  }
}
