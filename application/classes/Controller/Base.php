<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Base extends Controller_Template {
    public $template = 'base';

    public function before()
    {
        parent::before();

        $this->template->title = 'Test';
        $this->template->styles = [
            HTML::style('media/css/bootstrap.min.css'),
            HTML::style('media/css/style.css'),
        ];
        $this->template->scripts = [
            HTML::script('media/js/jquery-3.4.1.slim.min.js'),
            HTML::script('media/js/bootstrap.bundle.min.js')
        ];
        $this->template->navbar = View::factory('navbar');
        $this->template->jumbotron = View::factory('jumbotron');
        $this->template->container = View::factory('container');
        $this->template->footer = View::factory('footer');
    }
}
