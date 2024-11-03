<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=> 'admin',
                'username'=> 'admin',
                'role'=>'admin',
                'password'=>bcrypt('admin')
            ],[
                'name'=> 'guru',
                'username'=> 'guru',
                'role'=>'guru',
                'password'=>bcrypt('guru123')
            ], [
                'name'=> 'siswa',
                'username'=> 'siswa',
                'role'=>'siswa',
                'password'=>bcrypt('siswa123')
            ], [
                'name'=> 'kepsek',
                'username'=> 'kepsek',
                'role'=>'kepsek',
                'password'=>bcrypt('kepsek123')
            ],
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}

