<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Backend\Akun;
use App\Models\Customer;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
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
