<?php defined('SYSPATH') OR die('No direct access allowed.');

return [
    TRUE => [
        'layout' => [
            'view' => 'layout',
            'data' => null,
            'render' => false
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
            'view' => 'dashboard/layout',
            'render' => false
        ],
        'scripts' => [
            HTML::script('media/js/solid-5.0.13.js'),
            HTML::script('media/js/fontawesome-5.0.13.js'),
            HTML::script('media/js/popper-1.14.0.min.js'),
        ],
        'styles' => [
            HTML::style('media/css/style2.css'),
        ],
    ],
];