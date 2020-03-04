<?php defined('SYSPATH') OR die('No direct access allowed.');

//todo: use param as diff class Block
class Page
{
    /**
     * @var mixed|View
     */
    protected $_layout;

    /**
     * @var mixed|View
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

        $this->layout(Arr::get($config, 'layout'));
        $this->title(Arr::get($config, 'title'));
        $this->menu(Arr::get($config, 'menu'));
        $this->content(Arr::get($config, 'content'));
        $this->footer(Arr::get($config, 'footer'));

        foreach (Arr::get($config, 'styles', []) as $style){
            $this->style($style);
        }

        foreach (Arr::get($config, 'scripts', []) as $script){
            $this->script($script);
        }
    }

    /**
     * @param null $view
     * @param array|null $data
     * @param bool $render
     *
     * @return $this|mixed|View
     * @throws View_Exception
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function layout($view = null, array $data = null, bool $render = false)
    {
        return $this->value($this->_layout, $view, $data, $render);
    }

    public function title($view = null, array $data = null, bool $render = true)
    {
        return $this->value($this->_title, $view, $data, $render);
    }

    public function menu($view = null, array $data = null, bool $render = true)
    {
        return $this->value($this->_menu, $view, $data, $render);
    }

    public function content($view = null, array $data = null, bool $render = true)
    {
        return $this->value($this->_content, $view, $data, $render);
    }

    public function footer($view = null, array $data = null, bool $render = true)
    {
        return $this->value($this->_footer, $view, $data, $render);
    }

    public function data(string $key = null, $value = null)
    {
        if (is_null($key)) {
            return $this->_data;
        } else if (is_null($value)) {
            return Arr::get($this->_data, $key);
        } else {
            return $this->value($this->_data[$key], $value);
        }
    }

    public function alert(string $text = null)
    {
        if (is_null($text)) {
            return $this->_alerts;
        } else {
            return $this->value($this->_alerts[], $text);
        }
    }

    public function style(string $style = null)
    {
        if (is_null($style)) {
            return $this->_styles;
        } else {
            return $this->value($this->_styles[], $style);
        }
    }

    public function script(string $script = null)
    {
        if (is_null($script)) {
            return $this->_scripts;
        } else {
            return $this->value($this->_scripts[], $script);
        }
    }

    public function render()
    {
        return $this->layout()
            ->set('page', $this)
            ->set($this->data())
            ->render();
    }

    protected function isFile(string $file): bool
    {
        return !empty(Kohana::find_file('views', $file));
    }

    /**
     * Set/Get value the target variable
     *
     * @param mixed $target
     * @param mixed|View $view
     * @param array|null $data
     * @param bool $render
     *
     * @return $this|mixed|View
     * @throws View_Exception
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    protected function value(&$target, $view = null, array $data = null, bool $render = true)
    {
        if (is_array($view)) {
            extract($view);
        }

        if (is_null($view)) {
            return $target ?? '';
        } else if ($view instanceof View) {
            $target = $view;

            if ($render) {
                $target->render();
            }
        } else if (is_string($view)) {
            if ($this->isFile($view)) {
                $target = View::factory($view, $data);

                if ($render) {
                    $target->render();
                }
            } else {
                $target = $view;
            }
        }

        return $this;
    }
}