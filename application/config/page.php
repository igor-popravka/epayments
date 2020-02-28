<?php defined('SYSPATH') OR die('No direct access allowed.');

return [
    TRUE => [
        'scripts' => [
            HTML::script('media/js/jquery-3.4.1.slim.min.js'),
            HTML::script('media/js/bootstrap.bundle.min.js'),
        ],
        'styles' => [
            HTML::style('media/css/bootstrap.min.css'),
            HTML::style('media/css/style.css'),
        ],
    ],
    'home' => [
        'menu' => 'menu'
    ]
];