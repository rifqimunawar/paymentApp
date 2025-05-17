<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PesansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('pesans')->delete();
        
        \DB::table('pesans')->insert(array (
            0 => 
            array (
                'id' => 8,
                'user_id' => 4,
                'title' => 'Tagihan Pembayaran Ronda',
                'message' => '
<p>Kepada Yth. Bapak/Ibu <strong>Rifqi Munawar Ridwan</strong>,</p>
<p>
Berdasarkan catatan absensi kegiatan ronda di lingkungan kita, diketahui bahwa pada tanggal
<strong>Jumat, 4 April 2025</strong>, Bapak/Ibu tidak hadir dalam jadwal ronda yang telah ditentukan.
Sesuai dengan kesepakatan warga mengenai sanksi administratif bagi ketidakhadiran kegiatan ronda,
maka dikenakan tagihan sebesar <strong>Rp 10.000</strong> sebagai bentuk kontribusi pengganti kehadiran.
</p>
<p>
Sampai saat ini, tagihan tersebut belum dibayarkan, tercatat <strong>42 hari</strong> dari jadwal ketidak hadiran ronda.
</p>
<p>
Pembayaran dapat dilakukan melalui pengurus RT atau saluran pembayaran yang telah ditentukan paling lambat
sebelum jadwal ronda berikutnya.
</p>
<p>
Mohon kerjasamanya agar kegiatan ronda dapat terus berjalan lancar dan keamanan lingkungan kita tetap terjaga.
</p>
<p>
Atas perhatian dan pengertiannya, kami ucapkan terima kasih.
</p>
<p>
Hormat kami,<br>
<em>Pengurus Keamanan Lingkungan</em>
</p>
',
                'type' => 1,
                'read_at' => NULL,
                'link' => NULL,
                'created_by' => 'munawar',
                'updated_by' => 'munawar',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-05-16 13:21:30',
                'updated_at' => '2025-05-16 13:21:30',
            ),
            1 => 
            array (
                'id' => 9,
                'user_id' => 4,
                'title' => 'Tagihan Pembayaran Ronda',
                'message' => '
<p>Kepada Yth. Bapak/Ibu <strong>Rifqi Munawar Ridwan</strong>,</p>
<p>
Berdasarkan catatan absensi kegiatan ronda di lingkungan kita, diketahui bahwa pada hari
<strong>Jumat, 4 April 2025</strong>, Bapak/Ibu tidak hadir dalam jadwal ronda yang telah ditentukan.
Sesuai dengan kesepakatan warga mengenai sanksi administratif bagi ketidakhadiran kegiatan ronda,
maka dikenakan tagihan sebesar <strong>Rp 10.000</strong> sebagai bentuk kontribusi pengganti kehadiran.
</p>
<p>
Sampai saat ini, tagihan tersebut belum dibayarkan, tercatat <strong>43 hari</strong> dari jadwal ketidak hadiran ronda.
</p>
<p>
Pembayaran dapat dilakukan melalui pengurus RT atau saluran pembayaran yang telah ditentukan paling lambat
sebelum jadwal ronda berikutnya.
</p>
<p>
Mohon kerjasamanya agar kegiatan ronda dapat terus berjalan lancar dan keamanan lingkungan kita tetap terjaga.
</p>
<p>
Atas perhatian dan pengertiannya, kami ucapkan terima kasih.
</p>
<p>
Hormat kami,<br>
<em>Pengurus Keamanan Lingkungan</em>
</p>
',
                'type' => 1,
                'read_at' => NULL,
                'link' => NULL,
                'created_by' => 'munawar',
                'updated_by' => 'munawar',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-05-17 20:04:40',
                'updated_at' => '2025-05-17 20:04:40',
            ),
            2 => 
            array (
                'id' => 10,
                'user_id' => 5,
                'title' => 'Tagihan Pembayaran Ronda',
                'message' => '
<p>Kepada Yth. Bapak/Ibu <strong>Dilan</strong>,</p>
<p>
Berdasarkan catatan absensi kegiatan ronda di lingkungan kita, diketahui bahwa pada hari
<strong>Sabtu, 12 April 2025</strong>, Bapak/Ibu tidak hadir dalam jadwal ronda yang telah ditentukan.
Sesuai dengan kesepakatan warga mengenai sanksi administratif bagi ketidakhadiran kegiatan ronda,
maka dikenakan tagihan sebesar <strong>Rp 10.000</strong> sebagai bentuk kontribusi pengganti kehadiran.
</p>
<p>
Sampai saat ini, tagihan tersebut belum dibayarkan, tercatat <strong>35 hari</strong> dari jadwal ketidak hadiran ronda.
</p>
<p>
Pembayaran dapat dilakukan melalui pengurus RT atau saluran pembayaran yang telah ditentukan paling lambat
sebelum jadwal ronda berikutnya.
</p>
<p>
Mohon kerjasamanya agar kegiatan ronda dapat terus berjalan lancar dan keamanan lingkungan kita tetap terjaga.
</p>
<p>
Atas perhatian dan pengertiannya, kami ucapkan terima kasih.
</p>
<p>
Hormat kami,<br>
<em>Pengurus Keamanan Lingkungan</em>
</p>
',
                'type' => 1,
                'read_at' => NULL,
                'link' => NULL,
                'created_by' => 'dilan',
                'updated_by' => 'dilan',
                'deleted_by' => NULL,
                'deleted_at' => NULL,
                'created_at' => '2025-05-17 20:05:50',
                'updated_at' => '2025-05-17 20:05:50',
            ),
        ));
        
        
    }
}