<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$64eha2TtFDnJ1x.Tl8vIwuyA4xTsmCP0qyuN7cOxf0rRRkKSuoAhC', 'role_id' => 1, 'remember_token' => '','first_name' => 'Vasya', 'last_name'=> 'Petrov'],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
