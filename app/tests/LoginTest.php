<?php

class LoginTest extends TestCase
{
    /**
     * @test if you are no connected you are redirected to loggin page
     */
    public function testNoLoggedRedirectLoginPage()
    {
        Route::enableFilters();
        $this->call('GET', 'aperos');
        $this->assertRedirectedToRoute('login');
    }

    /**
     * @test if you are no connected you are redirected to loggin page
     */
    public function testLoggedRedirectedAperosPage()
    {
        Route::enableFilters();
        $user = new User(['username'=>'Antoine', 'password'=>'Antoine']);
        $this->be($user);

        $this->call('GET', 'aperos');

        $this->assertViewHas('posts');
    }

    /**
     * @test checkuserdata authentifcation success
     */

    function testWithGoodUserAuth()
    {
        $input = ['username'=>'Antoine', 'password'=>'Antoine'];

        $this->call('POST', 'authentification', $input);

        $this->assertRedirectedToRoute('aperos.create', null, [ 'message' => 'Hello, i know you now, post your apero']);

    }

    /**
     * @test checkuserdata authentifcation fails
     */
    function testWithBadGoodUserAuth()
    {
        $input = ['username'=>'Antoine', 'password'=>'notgood'];

        $this->call('POST', 'authentification', $input);

        $this->assertRedirectedToRoute('login');
        $this->assertSessionHasErrors(['message' => 'il y a une erreur dans username/password']);
        $this->assertHasOldInput();
    }

}