<?php

    return array(

        'default' => 'mysql',

        'connections' => array(

            'sqlite' => array(
                'driver' => 'sqlite',
                'database' => ':memory:',
                'prefix' => '',
            ),

            'mysql' => array(
                'driver' => 'mysql',
                'host' => getenv('DB_HOST'),
                'database' => getenv('DB_NAME'),
                'username' =>  getenv('DB_USERNAME'),
                'password' =>  getenv('DB_PASSWORD'),
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ),
        ),
    );

