<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('user')->insert([
            [
                'nama' => 'Jon Snow',
                'username' => 'admin',
                'password' => Hash::make('secret'),
                'is_admin' => 1,
                'hak' => json_encode(['admin','user-entry','inventory-master','inventory-entry','inventory-view','peminjaman-entry','peminjaman-view']),
                'created' => Carbon::now(),
                'updated' => Carbon::now(),
            ],
            [
                'nama' => 'Daenerys Targaryen',
                'username' => 'member',
                'password' => Hash::make('secret'),
                'is_admin' => 0,
                'hak' => json_encode(['inventory-view','peminjaman-view']),
                'created' => Carbon::now(),
                'updated' => Carbon::now(),
            ]
        ]);
    }
}
