<?php

use Illuminate\Database\Seeder;

class CoordComissaoCientificaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = DB::table('users')->where('name','CoordComissaoCientifica')->pluck('id');

		DB::table('coord_comissao_cientificas')->insert([
		'user_id' => $user_id[0],
		]);
    }
}
