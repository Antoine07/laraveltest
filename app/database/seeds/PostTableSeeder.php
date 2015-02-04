<?php


class PostTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('posts')->delete();
        DB::statement("ALTER TABLE posts AUTO_INCREMENT=1");
        $dateTime = new DateTime('now');
        $dateTime = $dateTime->format('Y-m-d H:i:s');
        DB::table('posts')->insert(
            [
                [
                    'title' => 'PSR-4 Autoload',
                    'user_id' => 1,
                    'tag_id' =>1

                ],
                [
                    'title' => 'Eloquent',
                    'user_id' => 1,
                    'tag_id' =>1

                ]
            ]
        );
    }

}

