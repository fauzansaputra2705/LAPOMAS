<?php

use Illuminate\Database\Seeder;
use App\Kategori;

class JenisBidangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$input = [
    		[ 
    			'id_kategori' => '1', 
    			'nama_kategori' => 'Dampak Lingkungan'],
    		[ 
    			'id_kategori' => '2', 
    			'nama_kategori' => 'Dampak Sosial Kemasyarakatan'
    		],
    		[ 
    			'id_kategori' => '3', 
    			'nama_kategori' => 'Data dan Informasi Umum'
    		],
    		[ 
    			'id_kategori' => '4',
    			'nama_kategori' => 'Energi dan Sumber Daya Alam'
    		],
    		[ 
    			'id_kategori' => '5', 
    			'nama_kategori' => 'Fasilitas Kesehatan Membatasi Pemberian Obat'
    		],
    		[ 
    			'id_kategori' => '6', 
    			'nama_kategori' => 'Info Form Pendaftaran'
    		],
    		[ 
    			'id_kategori' => '7', 
    			'nama_kategori' => 'Info Nomor Kartu'
    		],
    		[ 
    			'id_kategori' => '8', 
    			'nama_kategori' => 'Informasi Umum'
    		],
    		[ 
    			'id_kategori' => '9', 
    			'nama_kategori' => 'Infrastruktur'
    		],
    		[ 
    			'id_kategori' => '10', 
    			'nama_kategori' =>  'Iuran Biaya Layanan Kesehatan di Faskes'
    		],
    		[ 
    			'id_kategori' => '11', 
    			'nama_kategori' =>  'Iuran'
    		],
    		[ 
    			'id_kategori' => '12', 
    			'nama_kategori' =>  'Iuran Biaya Obat'
    		],
    		[ 
    			'id_kategori' => '13', 
    			'nama_kategori' =>  'Jadwal / Waktu'
    		],
    		[ 
    			'id_kategori' => '14', 
    			'nama_kategori' =>  'Jaga Asrama'
    		],
    		[ 
    			'id_kategori' => '15', 
    			'nama_kategori' =>  'Barang Hilang'
    		],
    		[ 
    			'id_kategori' => '16', 
    			'nama_kategori' =>  'Kartu, PIN, Buku Tabungan'
    		],
    		[ 
    			'id_kategori' => '17', 
    			'nama_kategori' =>  'Keluhan'
    		],
    		[ 
    			'id_kategori' => '18', 
    			'nama_kategori' =>  'Keamanan & Ketertiban Ponpes'
    		],
    		[ 
    			'id_kategori' => '19', 
    			'nama_kategori' =>  'Keamanan & Ketertiban Masyarakat'
    		],
    		[ 
    			'id_kategori' => '20', 
    			'nama_kategori' =>  'Kecelakaan'
    		],
    		[ 
    			'id_kategori' => '21', 
    			'nama_kategori' =>  'Keluhan Administrasi Pendaftaran Online'
    		],
    		[ 
    			'id_kategori' => '22', 
    			'nama_kategori' =>  'Keluhan Gangguan Aplikasi Online PSB'
    		],
    		[ 
    			'id_kategori' => '23', 
    			'nama_kategori' =>  'Keluhan Hotline Service Sulit Dihubungi'
    		],
    		[ 
    			'id_kategori' => '24', 
    			'nama_kategori' =>  'Keluhan Pembatasan Kunjungan'
    		],
    		[ 
    			'id_kategori' => '25', 
    			'nama_kategori' =>  'Kesiswaan'
    		],
    		[ 
    			'id_kategori' => '26', 
    			'nama_kategori' =>  'Kesiswaan Baru'
    		],
    		[ 
    			'id_kategori' => '27', 
    			'nama_kategori' =>  'Kesehatan'
    		],
    		[ 
    			'id_kategori' => '28', 
    			'nama_kategori' =>  'Koreksi Data'
    		],
    		[ 
    			'id_kategori' => '29', 
    			'nama_kategori' =>  'Kritik/Saran Untuk PENGADUAN!'
    		],
    		[ 
    			'id_kategori' => '30', 
    			'nama_kategori' =>  'Kualitas'
    		],
    		[ 
    			'id_kategori' => '31', 
    			'nama_kategori' =>  'Pariwisata/ Tour'
    		],
    		[ 
    			'id_kategori' => '32', 
    			'nama_kategori' =>  'Pelayanan Kesehatan'
    		],
    		[ 
    			'id_kategori' => '33', 
    			'nama_kategori' =>  'Pelayanan Obat'
    		],
    		[ 
    			'id_kategori' => '34', 
    			'nama_kategori' =>  'Pendaftaran Siswa'
    		],
    		[ 
    			'id_kategori' => '35', 
    			'nama_kategori' =>  'Pendaftaran Via Website'
    		],
    		[ 
    			'id_kategori' => '36', 
    			'nama_kategori' =>  'Pendidikan'
    		],
    		[ 
    			'id_kategori' => '37', 
    			'nama_kategori' =>  'Penyelewengan'
    		],
    		[ 
    			'id_kategori' => '38', 
    			'nama_kategori' =>  'Permasalahan'
    		],
    		[ 
    			'id_kategori' => '39', 
    			'nama_kategori' =>  'Permintaan Informasi'
    		],
    		[ 
    			'id_kategori' => '40', 
    			'nama_kategori' =>  'Permintaan Informasi Cek Stat Kesiswaan'
    		],
    		[ 
    			'id_kategori' => '41', 
    			'nama_kategori' =>  'Permintaan Tentang Regulasi'
    		],
    		[ 
    			'id_kategori' => '42', 
    			'nama_kategori' =>  'Permintaan Informasi Sarana Medik'
    		],
    		[ 
    			'id_kategori' => '43', 
    			'nama_kategori' =>  'Permintaan Konsultasi'
    		],
    		[ 
    			'id_kategori' => '44', 
    			'nama_kategori' =>  'Peserta Tidak Mendapat Layanan Obat'
    		],
    		[ 
    			'id_kategori' => '45', 
    			'nama_kategori' =>  'Sosialisasi'
    		],
    		[ 
    			'id_kategori' => '46', 
    			'nama_kategori' =>  'Tidak Dapat Email Balasan'
    		],
    		[ 
    			'id_kategori' => '47', 
    			'nama_kategori' =>  'Tindak Pidana'
    		],
    		[ 
    			'id_kategori' => '48', 
    			'nama_kategori' =>  'Apresiasi'
    		],
    		[ 
    			'id_kategori' => '49', 
    			'nama_kategori' =>  'Sosialisasi dan Edukasi'
    		],
    		[ 
    			'id_kategori' => '50', 
    			'nama_kategori' =>  'Kesejahteraan Sosial'
    		],
    		[ 
    			'id_kategori' => '51', 
    			'nama_kategori' =>  'Ketertiban Umum'
    		],
    		[ 
    			'id_kategori' => '52', 
    			'nama_kategori' =>  'Keuangan'
    		],
    		[ 
    			'id_kategori' => '53', 
    			'nama_kategori' =>  'Komunikasi'
    		],
    		[ 
    			'id_kategori' => '54', 
    			'nama_kategori' =>  'Perizinan'
    		],
    		[ 
    			'id_kategori' => '55', 
    			'nama_kategori' =>  'Transportasi'
    		],
    	];
    	Kategori::insert($input);
    }
}
