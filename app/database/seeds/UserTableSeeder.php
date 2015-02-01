<?php
/**
 * Created by PhpStorm.
 * User: antoine
 * Date: 24/01/15
 * Time: 18:34
 */

class UserTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT=1'); // remettre l'auto
        $dateTime = new DateTime('now');
        $dateTime = $dateTime->format('Y-m-d H:i:s');
        DB::table('users')->insert(
            [
                [
                    'username' => 'Antoine',
                    'email' => 'antoine.lucsko@wanadoo.fr',
                    'age' => 42,
                    'score' => 15,
                    'password' => Hash::make('Antoine'),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime
                ],
                [
                    'username' => 'Cecile',
                    'email' => 'cecile.lucsko@wanadoo.fr',
                    'age' => 42,
                    'score' => 15,
                    'password' => Hash::make('Cecile'),
                    'created_at' => $dateTime,
                    'updated_at' => $dateTime
                ]
            ]);
    }

}