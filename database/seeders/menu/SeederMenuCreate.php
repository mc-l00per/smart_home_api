<?php

namespace Database\Seeders\menu;

use App\Models\crud_menu\CrudMenu;
use Illuminate\Database\Seeder;

class SeederMenuCreate extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $menu = [
            [
                'title' => 'Questions',
                'url' => 'questions'
            ],
            [
                'title' => 'title2',
                'url' => 'url2'
            ]
        ];

        foreach ($menu as $item) {
            CrudMenu::create($item);
        }
    }
}
