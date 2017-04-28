<?php

use Illuminate\Database\Seeder;

class TireSizeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'size' => '225/55 R16',],
            ['id' => 2, 'size' => '225/45 R17',],

        ];

        foreach ($items as $item) {
            \App\TireSize::create($item);
        }
    }
}
