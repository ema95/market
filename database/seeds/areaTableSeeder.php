<?php

use Illuminate\Database\Seeder;

class areaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('area')->insert([
        		'luogo' => 'piazza mercato',
        		'righe' => '5',
        		'colonne' => '4'
        	]);

    }
}
