<?php defined('SYSPATH') OR die('No direct access allowed.');

return [
    TRUE => [
        'layout' => [
            'content' => 'layout'
        ],
        'blocks' => [
            'title' => 'EPayments',
            'menu' => 'menu',
            'footer' => 'footer',
        ],
        'title' => 'EPayments',
        'menu' => 'menu',
        'footer' => 'footer',
        'scripts' => [
            HTML::script('media/js/jquery-3.4.1.slim.min.js'),
            HTML::script('media/js/bootstrap-4.4.1.min.js'),
        ],
        'styles' => [
            HTML::style('media/css/bootstrap.min.css'),
            HTML::style('media/css/style.css'),
        ],
    ],
    'dashboard' => [
        'layout' => [
            'content' => 'profile/layout'
        ],
        'scripts' => [
            HTML::script('media/js/solid-5.0.13.js'),
            HTML::script('media/js/fontawesome-5.0.13.js'),
            HTML::script('media/js/popper-1.14.0.min.js'),
            HTML::script('media/js/profile/script.js'),
        ],
        'styles' => [
            HTML::style('media/css/profile/style.css'),
        ],
    ],
];