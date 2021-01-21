<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    public function getData(): array
    {
        $faker = Factory::create('ru_RU');

        $data = [];
        for($i = 0; $i < 10; $i++) {
            $title = $faker->sentence(mt_rand(3, 10));
            $data[] = [
                'title' => $title,
                'description' => $faker->realText(mt_rand(100, 200))
            ];
        }

        return $data;
    }
}
