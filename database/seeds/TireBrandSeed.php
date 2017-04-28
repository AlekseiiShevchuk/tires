<?php

use Illuminate\Database\Seeder;

class TireBrandSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Lassa',],

        ];

        foreach ($items as $item) {
            \App\TireBrand::create($item);
        }
    }
}
