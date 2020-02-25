<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Base extends Controller_Template {
    public $template = 'base';

    public $auth;

    public function before()
    {
        parent::before();

        $this->template->title = 'Test';
        $this->template->errors = [];
        $this->template->styles = [
            HTML::style('media/css/bootstrap.min.css'),
            HTML::style('media/css/style.css'),
        ];
        $this->template->scripts = [
            HTML::script('media/js/jquery-3.4.1.slim.min.js'),
            HTML::script('media/js/bootstrap.bundle.min.js')
        ];
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
