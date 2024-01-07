<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Backend\Akun;
use App\Models\Backend\Bagkategori;
use App\Models\Backend\Kategori;
use App\Models\Customer;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
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
        // Kategori::create([
        //     'jenis_servis' => '',
        //     'spesialis' => 'umum',
        //     'bagkategori_id' => '1',
        //     'biaya_servis' => '100000'
        // ]);
        // Kategori::create([
        //     'jenis_servis' => '',
        //     'spesialis' => 'umum',
        //     'bagkategori_id' => '1',
        //     'biaya_servis' => '100000'
        // ]);
        // Kategori::create([
        //     'jenis_servis' => '',
        //     'spesialis' => 'umum',
        //     'bagkategori_id' => '1',
        //     'biaya_servis' => '100000'
        // ]);
        // Kategori::create([
        //     'jenis_servis' => '',
        //     'spesialis' => 'umum',
        //     'bagkategori_id' => '1',
        //     'biaya_servis' => '100000'
        // ]);
        // Kategori::create([
        //     'jenis_servis' => '',
        //     'spesialis' => 'umum',
        //     'bagkategori_id' => '1',
        //     'biaya_servis' => '100000'
        // ]);
        // Kategori::create([
        //     'jenis_servis' => '',
        //     'spesialis' => 'umum',
        //     'bagkategori_id' => '1',
        //     'biaya_servis' => '100000'
        // ]);
        // Kategori::create([
        //     'jenis_servis' => '',
        //     'spesialis' => 'umum',
        //     'bagkategori_id' => '1',
        //     'biaya_servis' => '100000'
        // ]);

        // User::create([
        //     'nama' => 'Administrator',
        //     'email' => 'admin@gmail.com',
        //     'is_admin' => 1,
        //     'no_hp' => '081234567891',
        //     'tanggal_lahir' => '',
        //     'jenis kelamin' => 'Perempuan',
        //     'jabatan' => 'Admin',
        //     'password' => bcrypt('P@55word'),
        // ]);
        // Customer::create([
        //     'nama' => 'Lynda Fatikah',
        //     'alamat' => 'Jalan Syalalala',
        //     'jenis_kelamin' => 'ciwiw',
        //     'no_hp' => '0895704324887',
        // ]);
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
    }
}
