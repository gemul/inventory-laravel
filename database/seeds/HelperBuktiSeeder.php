<?php

use Illuminate\Database\Seeder;

class HelperBuktiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('helper_bukti')->insert([
            [
                "bukti_text" => "Kartu Pelajar",
                "created" => "2019-03-18 20:17:44"
            ],
            [
                "bukti_text" => "Kartu Peminjaman",
                "created" => "2019-03-18 20:17:44"
            ],
            [
                "bukti_text" => "KTM",
                "created" => "2019-03-18 20:17:44"
            ],
            [
                "bukti_text" => "KTP",
                "created" => "2019-03-18 20:17:44"
            ],
            [
                "bukti_text" => "Sertifikat Tanah",
                "created" => "2019-03-18 20:17:44"
            ],
            [
                "bukti_text" => "SIM",
                "created" => "2019-03-18 20:17:44"
            ]
        ]);
    }
}
