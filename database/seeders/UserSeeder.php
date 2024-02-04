<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =
        [
            [
                'name' => 'Fathur Rahman, ST',
                'username' => 'fathurrahman4_',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123'),
                'alamat' => 'Payakumbuh',
                'role' => 'admin'
            ],
            [
                'name' => 'SMKN 4 Payakumbuh',
                'username' => 'smkn4pyk',
                'email' => 'sekolah@gmail.com',
                'password' => Hash::make('sekolah123'),
                'alamat' => 'Jl. Koto Kociak, Kel. Padang Sikabu, Kec. Lamposi Tigo Nagori, Padang Sikabu, Kec. Lamposi Tigo Nagori, Kota Payakumbuh',
                'sekolah_join_date' => '2023-10-28',
                'sekolah_info' => 'SMK Technology, SMK Pusat Keunggulan',
                'role' => 'sekolah'
            ],
            [
                'name' => 'Kurator Dinas Pendidikan',
                'username' => 'kurator',
                'email' => 'kurator@gmail.com',
                'password' => Hash::make('kurator123'),
                'role' => 'kurator'
            ],
            [
                'name' => 'Budi Susanto',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user123'),
                'role' => 'user'
            ],
        ];

        foreach ($user as $user) {
            User::create($user);
        }
    }
}
