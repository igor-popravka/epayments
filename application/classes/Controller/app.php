<?php

abstract class Controller_App extends Kohana_Controller
{
    /**
     * @var Auth
     */
    public $auth = null;

    /**
     * @var Model_User|null
     */
    public $user = false;

    public function before()
    {
        parent::before();
        $this->auth = Auth::instance();
        $this->user = $this->auth->get_user();
    }

    public function goHome()
    {
        $url = Route::url('default', null, true);
        static::redirect($url);
    }
}