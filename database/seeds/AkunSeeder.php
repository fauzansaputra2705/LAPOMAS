<?php

use Illuminate\Database\Seeder;
use App\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            //superadmin
            [
                'nama_lengkap' => 'superadmin', 
                'email' => 'superadmin@gmail.com', 
                'username' => 'superadmin', 
                'no_telepon' => '-', 
                'image' => 'logo/imageadmin.png',
                'password' => bcrypt('superadmin@123'), 
                'role' => 'superadmin',
                'kategori_id' => '0',
            ],
            //admin
        	[
        		'nama_lengkap' => 'admin', 
                'email' => 'admin@gmail.com', 
                'username' => 'admin', 
                'no_telepon' => '-', 
                'image' => 'logo/imageadmin.png',
                'password' => bcrypt('admin@123'), 
                'role' => 'admin',
                'kategori_id' => '55',
        	],
            //petugas
        	[
        		'nama_lengkap' => 'petugas', 
                'email' => 'petugas@gmail.com', 
                'username' => 'petugas', 
                'no_telepon' => '-', 
                'image' => 'logo/imageadmin.png',
                'password' => bcrypt('petugas@123'),
                'role' => 'petugas',
                'kategori_id' => '55',
        	],
        	[
        		'nama_lengkap' => 'user', 
                'email' => 'user@gmail.com', 
                'username' => 'user', 
                'no_telepon' => '-' , 
                'image' => 'logo/imageadmin.png',
                'password' => bcrypt('user@123'),
                'role' => 'user',
                'kategori_id' => '55',
        	],
        ];

        User::insert($user);
    }
}
