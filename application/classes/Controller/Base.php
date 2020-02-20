<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Base extends Controller_Template {
    public $template = 'base';

    public function before()
    {
        parent::before();

        $this->template->styles = [];
        $this->template->scripts = [];
    }
}
