<?php


class TagTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('tags')->delete();
        DB::statement("ALTER TABLE tags AUTO_INCREMENT=1");

        DB::table('tags')->insert(
            [
                [
                    "name" => "php5.4",
                    'count_apero' => 1,
                ],
                [
                    "name" => "AngularJS",
                    'count_apero' => 1,
                ],
                [
                    "name" => "AngularJS/Laravel",
                    'count_apero' => 0
                ],
                [
                    "name" => "Fabric",
                    'count_apero' => 0
                ],
                [
                    "name" => "PHPUnit",
                    'count_apero' => 0
                ],
                [
                    "name" => "Behat",
                    'count_apero' => 0
                ],
                [
                    "name" => "Travis",
                    'count_apero' => 0
                ],
                [
                    "name" => "Gulp",
                    'count_apero' => 0
                ]
            ]

        );
    }

}

