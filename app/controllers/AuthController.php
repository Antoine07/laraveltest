<?php

class AuthController extends BaseController
{

    /**
     * @return View login
     */
    public function login()
    {
        return View::make('aperos.login');
    }

    /**
     * @return Return redirect to home page
     */
    public function logout()
    {

        Auth::logout();

        return Redirect::home()->with('message', 'you have been logged out');
    }

    /**
     * @return Redirection to specific page
     */
    public function auth()
    {

        if (Input::server("REQUEST_METHOD") == "POST") {
            $userdata = [
                'username' => Input::get('username'),
                'password' => Input::get('password'),
            ];

            $validator = Validator::make($userdata, [
                    "username" => "required",
                    "password" => "required"]
            );

            if ($validator->fails()) {

                return Redirect::to('login')->withErrors($validator)->withInput(Input::except('password'));

            } else {

                $remember = Input::has('remember') ? true : false;
                return $this->checkUserdata($userdata, $remember);
            }
        } else {

            if (!Auth::guest()) {
                //return "hello";
                return Redirect::to('aperos')->with('message', 'Hello, i know you now, post your apero');
            }
        }
    }

    /**
     * @param $userdata
     * @param bool $remember
     * @return mixed
     */
    private function checkUserdata($userdata, $remember = false)
    {

        if (Auth::attempt($userdata, $remember)) {

            return Redirect::to('aperos')->with('message', 'Hello, i know you now, post your apero');
        }

        return Redirect::to('login')
            ->withErrors(['message' => 'il y a une erreur dans username/password'])
            ->withInput(['username' => $userdata['username']]);
    }

}
