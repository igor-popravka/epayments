<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Page
{
    public function action_index()
    {
        //$this->content = View::factory('home/index');

        $this->page->content('home/index');
    }
}