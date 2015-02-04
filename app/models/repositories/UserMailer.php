<?php

namespace Repositories;

use User;

class UserMailer extends Mailer
{

    public function welcome(User $user)
    {
        $view = 'emails.welcome';
        $data = [];
        $subject = 'New apero post';

        return $this->sendTo($user, $subject, $view, $data);
    }

}