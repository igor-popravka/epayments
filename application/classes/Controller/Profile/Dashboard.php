<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Profile_Dashboard extends Controller_Page
{
    public function action_index()
    {
        $this->page->content('dashboard/index');
    }
}