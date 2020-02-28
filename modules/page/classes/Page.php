<?php defined('SYSPATH') OR die('No direct access allowed.');

class Page
{
    protected $_layout;

    protected $_title;

    protected $_menu;

    protected $_content;

    protected $_footer;

    protected $_data = [];

    protected $_alerts = [];

    protected $_styles = [];

    protected $_scripts = [];

    public function __construct(string $config = null)
    {
        $common = Kohana::$config->load('page')->get(true, []);
        $config = Kohana::$config->load('page')->get(strtolower($config), []);

        //todo make custom method 
        $config = array_merge_recursive($common, $config);

        $layout = Arr::get($config, 'layout');
        if (is_string($layout)) {
            $this->_layout = View::factory($layout);
        } else if ($layout instanceof View) {
            $this->_layout = $layout;
        }

        $this->_title = Arr::get($config, 'title');
        $this->_menu = Arr::get($config, 'menu');
        $this->_content = Arr::get($config, 'content');
        $this->_footer = Arr::get($config, 'footer');
        $this->_styles = Arr::get($config, 'styles', []);
        $this->_scripts = Arr::get($config, 'scripts', []);
    }

    public function title(string $title = null)
    {
        if (is_null($title)) {
            return $this->_title;
        } else {
            $this->_title = $title;

            return $this;
        }
    }

    public function menu($menu = null, array $data = null)
    {
        if (is_null($menu)) {
            return $this->_menu ?? '';
        } else if ($menu instanceof View) {
            $this->_menu = $menu->render();
        } else if (is_string($menu)) {
            $this->_menu = View::factory($menu, $data)->render();
        }

        return $this;
    }

    public function content($content = null, array $data = null)
    {
        if (is_null($content)) {
            return $this->_content ?? '';
        } else if ($content instanceof View) {
            $this->_content = $content->render();
        } else if (is_string($content)) {
            $this->_content = View::factory($content, $data)->render();
        }

        return $this;
    }

    public function footer($footer = null, array $data = null)
    {
        if (is_null($footer)) {
            return $this->_footer ?? '';
        } else if ($footer instanceof View) {
            $this->_footer = $footer->render();
        } else if (is_string($footer)) {
            $this->_footer = View::factory($footer, $data)->render();
        }

        return $this;
    }

    public function data(string $key = null, $value = null)
    {
        if (is_null($key)) {
            return $this->_data;
        } else if (is_null($value)) {
            return Arr::get($this->_data, $key);
        } else {
            $this->_data[$key] = $value;

            return $this;
        }
    }

    public function alert(string $text = null)
    {
        if (is_null($text)) {
            return $this->_alerts;
        } else {
            $this->_alerts[] = $text;

            return $this;
        }
    }

    public function style(string $style = null)
    {
        if (is_null($style)) {
            return $this->_styles;
        } else {
            $this->_styles[] = $style;

            return $this;
        }
    }

    public function script(string $script = null)
    {
        if (is_null($script)) {
            return $this->_scripts;
        } else {
            $this->_scripts[] = $script;

            return $this;
        }
    }

    public function render()
    {
        return $this->_layout->set('page', $this)->render();
    }
}