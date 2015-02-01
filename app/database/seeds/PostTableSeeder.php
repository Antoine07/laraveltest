<?php


class PostTableSeeder extends Seeder {

    public function run() {
        DB::table('posts')->delete();
        DB::statement("ALTER TABLE posts AUTO_INCREMENT=1");
        $dateTime = new DateTime('now');
        $dateTime = $dateTime->format('Y-m-d H:i:s');
        DB::table('posts')->insert(
            [
                [
                    'title' => 'PSR-4 Autoload',
                    'user_id' => 1,
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. ',
                    'status' => 'unpublish',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime
                ],
                [
                    'title' => 'Eloquent',
                    'user_id' => 1,
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. ',
                    'status' => 'publish',
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime
                ]
            ]
        );
    }

}

