<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert($this->getData());
    }

    public function getData(): array
    {
        $faker = Factory::create('ru_RU');

        $data = [];
        for($i = 0; $i < 10; $i++) {
            $data[] = [
                'title' => $faker->sentence(mt_rand(1, 5)),
                'url' => Str::random(10).'@gmail.com'
            ];
        }

        return $data;
    }
}
