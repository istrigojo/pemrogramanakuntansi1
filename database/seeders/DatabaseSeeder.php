<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\Akun;
use App\Models\Backend\User;
use App\Models\Backend\Bagkategori;
use App\Models\Backend\Kategori;
use App\Models\Backend\Mobil;
use App\Models\Backend\Montir;
use App\Models\Backend\Customer;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Akun::create([
            'kode_akun' => '1-1000',
            'nama_akun' => 'Kas',
        ]);
        Akun::create([
            'kode_akun' => '2-1000',
            'nama_akun' => 'Hutang',
        ]);
        Akun::create([
            'kode_akun' => '3-1000',
            'nama_akun' => 'Modal',
        ]);
        Akun::create([
            'kode_akun' => '4-1000',
            'nama_akun' => 'Pendapatan',
        ]);
        User::create([
            'nama' => 'Massayu Urbaningrum',
            'email' => 'admin@gmai.com',
            'akses' => '0',
            'password' => bcrypt('P@55word'),
            'no_hp' => '089570432488',
            'foto' => '',
        ]);
        Bagkategori::create([
            'kategori_servis' => 'Servis Berkala'
        ]);
        Bagkategori::create([
            'kategori_servis' => 'Perbaikan Mesin'
        ]);
        Bagkategori::create([
            'kategori_servis' => 'Sistem Kelistrikan'
        ]);
        Bagkategori::create([
            'kategori_servis' => 'Sistem Rem'
        ]);
        Bagkategori::create([
            'kategori_servis' => 'Sistem Suspensi dan Kemudi'
        ]);
        Bagkategori::create([
            'kategori_servis' => 'Sistem Bahan Bakar'
        ]);
        Bagkategori::create([
            'kategori_servis' => 'Servis AC Mobil'
        ]);
        Bagkategori::create([
            'kategori_servis' => 'Ban dan Roda'
        ]);
        Bagkategori::create([
            'kategori_servis' => 'Sistem Transmisi'
        ]);
        Bagkategori::create([
            'kategori_servis' => 'Layanan Tambahan'
        ]);
        Kategori::create([
            'jenis_servis' => 'Ganti Oli dan Filter',
            'spesialis' => 'umum',
            'bagkategori_id' => '1',
            'biaya_servis' => '100000'
        ]);
        Kategori::create([
            'jenis_servis' => 'Pengecekan Fluida',
            'spesialis' => 'umum',
            'bagkategori_id' => '1',
            'biaya_servis' => '100000'
        ]);
        Kategori::create([
            'jenis_servis' => 'Diagnosa Mesin',
            'spesialis' => 'umum',
            'bagkategori_id' => '2',
            'biaya_servis' => '100000'
        ]);
        Kategori::create([
            'jenis_servis' => 'Perbaikan Mesin Umum',
            'spesialis' => 'umum',
            'bagkategori_id' => '2',
            'biaya_servis' => '100000'
        ]);
        Kategori::create([
            'jenis_servis' => 'Overhaul Mesin',
            'spesialis' => 'umum',
            'bagkategori_id' => '2',
            'biaya_servis' => '100000'
        ]);
        Kategori::create([
            'jenis_servis' => 'Pengecekan dan Pemeliharaan Aki',
            'spesialis' => 'umum',
            'bagkategori_id' => '3',
            'biaya_servis' => '100000'
        ]);
        Kategori::create([
            'jenis_servis' => 'Perbaikan Sistem Pengapian',
            'spesialis' => 'umum',
            'bagkategori_id' => '3',
            'biaya_servis' => '100000'
        ]);


        // Customer::create([
        //     'nama' => 'Lynda Fatikah',
        //     'alamat' => 'Jalan Syalalala',
        //     'jenis_kelamin' => 'ciwiw',
        //     'no_hp' => '0895704324887',
        // ]);

        Mobil::create([
            'no_plat' => 'B 1234 TE',
            'merk' => 'Kijang',
            'warna' => 'Hitam',
        ]);
        Mobil::create([
            'no_plat' => 'T 5678 EG',
            'merk' => 'Ferrari',
            'warna' => 'Pink',
        ]);
        Customer::create([
            'nama_customer' => 'Heru Riyadi',
            'mobil_id' => '1',
            'email' => 'heru@gmail.com',
            'no_hp' => '082122118513',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jalan Setia Budi, Kota Tegal',
        ]);
        // Montir::create([
        //     'user_id' => '1',
        //     'tanggal_lahir' => '26-05-2000',
        //     'jenis_kelamin' => 'Perempuan',
        //     'alamat' => 'Jalan Ki Hajar Dewantoro',
        //     'kategori_id' => '1234',
        // ]);
    }
}
