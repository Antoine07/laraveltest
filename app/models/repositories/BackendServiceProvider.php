<?php

namespace Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind('Repositories\MailerUser');
        $this->app->bind('Repositories\Mailer');
    }


}