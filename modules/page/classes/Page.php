<?php defined('SYSPATH') OR die('No direct access allowed.');

class Page
{
    /**
     * @var mixed|View
     */
    protected $_layout;

    /**
     * @var string|null
     */
    protected $_title;

    /**
     * @var mixed|View
     */
    protected $_menu;

    /**
     * @var mixed|View
     */
    protected $_content;

    /**
     * @var mixed|View
     */
    protected $_footer;

    /**
     * @var array
     */
    protected $_data = [];

    /**
     * @var array
     */
    protected $_alerts = [];

    /**
     * @var array
     */
    protected $_styles = [];

    /**
     * @var array
     */
    protected $_scripts = [];

    public function __construct(string $config = null)
    {
        $common = Kohana::$config->load('page')->get(true, []);
        $config = Kohana::$config->load('page')->get(strtolower($config), []);

        $config = Arr::merge($common, $config);

        $layout = Arr::get($config, 'layout');
        if (is_string($layout)) {
            $this->_layout = View::factory($layout);
        } else if ($layout instanceof View) {
            $this->_layout = $layout;
        }

        $this->title(Arr::get($config, 'title'));
        $this->menu(Arr::get($config, 'menu'));
        $this->content(Arr::get($config, 'content'));
        $this->footer(Arr::get($config, 'footer'));

        $this->_styles = Arr::get($config, 'styles', []);
        $this->_scripts = Arr::get($config, 'scripts', []);
    }

    public function title(string $title = null)
    {
        if (is_null($title)) {
            return $this->_title ?? '';
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
            if ($this->isFile($menu)) {
                $this->_menu = View::factory($menu, $data)->render();
            } else {
                $this->_menu = $menu;
            }
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
            if ($this->isFile($content)) {
                $this->_content = View::factory($content, $data)->render();
            } else {
                $this->_content = $content;
            }
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
            if ($this->isFile($footer)) {
                $this->_footer = View::factory($footer, $data)->render();
            } else {
                $this->_footer = $footer;
            }
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

    protected function isFile (string $file): bool
    {
        return Kohana::find_file('views', $file) !== false;
    }
}