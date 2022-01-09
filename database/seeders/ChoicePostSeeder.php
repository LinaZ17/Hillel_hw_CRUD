<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChoicePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('choice_posts')->insert([
            ['title' => 'Новости Украины'],
            ['title' => 'Новости Европы'],
            ['title' => 'Новости Мира']
        ]);
    }
}
