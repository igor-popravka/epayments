<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dashboard extends Controller_Page
{
    public function action_index(){
        $this->page->content('<h1>Dashboard</h1>');
    }
}