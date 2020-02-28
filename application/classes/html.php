<?php defined('SYSPATH') OR die('No direct script access.');

class HTML extends Kohana_HTML
{
    public static function block(string $text, array $attributes = NULL)
    {
        return '<div '.HTML::attributes($attributes).'>'. $text .'</div>';
    }
}