<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Base extends Controller_Template {
    public $template = 'base';

    public $auth;

    public function before()
    {
        parent::before();

        $this->template->title = 'Test';
        $this->template->errors = [];
        $this->template->styles = Kohana::$config->load('page._common.styles');
        $this->template->scripts = Kohana::$config->load('page._common.scripts');
        $this->template->navbar = View::factory('navbar');

        if ($user = Auth::instance()->get_user()) {
            $username = $user->get('username');
        }

        $this->template->navbar->bind('username', $username);

        $this->template->jumbotron = View::factory('jumbotron');
        $this->template->content = View::factory('content');
        $this->template->footer = View::factory('footer');
    }
}
