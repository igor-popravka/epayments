<?php defined('SYSPATH') OR die('No direct access allowed.');

//todo: use param as diff class Block
class Page
{
    /**
     * @var mixed|Block
     */
    protected $_layout;

    /**
     * @var mixed|Block
     */
    protected $_title;

    /**
     * @var mixed|Block
     */
    protected $_menu;

    /**
     * @var mixed|Block
     */
    protected $_content;

    /**
     * @var mixed|Block
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

        foreach (Arr::get($config, 'styles', []) as $style) {
            $this->style($style);
        }

        foreach (Arr::get($config, 'scripts', []) as $script) {
            $this->script($script);
        }
    }

    /**
     * @param null $content
     * @param array|null $data
     *
     * @return Block
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function layout($content = null, array $data = null)
    {
        return $this->value($this->_layout, $content, $data);
    }

    /**
     *
     * @param null $content
     * @param array|null $data
     *
     * @return Block
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function title($content = null, array $data = null)
    {
        return $this->value($this->_title, $content, $data);
    }

    /**
     *
     * @param null $content
     * @param array|null $data
     *
     * @return Block
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function menu($content = null, array $data = null)
    {
        return $this->value($this->_menu, $content, $data);
    }

    /**
     *
     * @param null $content
     * @param array|null $data
     *
     * @return Block
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function content($content = null, array $data = null)
    {
        return $this->value($this->_content, $content, $data);
    }

    /**
     *
     * @param null $content
     * @param array|null $data
     *
     * @return Block
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function footer($content = null, array $data = null)
    {
        return $this->value($this->_footer, $content, $data);
    }

    public function set($key, $value = null)
    {
        if (is_array($key) || $key instanceof Traversable) {
            foreach ($key as $name => $value) {
                $this->_data[$name] = $value;
            }
        } else {
            $this->_data[$key] = $value;
        }

        return $this;
    }

    public function alert(string $text = null)
    {
        if (is_null($text)) {
            return $this->_alerts;
        }

        /**
         * @var Block $target
         */
        $this->value($target, $text);
        $this->_alerts[] = $target->render();

        return $this;
    }

    /**
     *
     * @param string|null $style
     *
     * @return $this|array|Block[]
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function style(string $style = null)
    {
        if (is_null($style)) {
            return $this->_styles;
        }

        /**
         * @var Block $target
         */
        $this->value($target, $style);
        $this->_styles[] = $target->render();

        return $this;
    }

    /**
     *
     * @param string|null $script
     *
     * @return $this|array|Block[]
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function script(string $script = null)
    {
        if (is_null($script)) {
            return $this->_scripts;
        }

        /**
         * @var Block $target
         */
        $this->value($target, $script);
        $this->_scripts[] = $target->render();

        return $this;
    }

    public function render()
    {
        return $this->layout()
            ->set('page', $this)
            ->set($this->_data)
            ->render();
    }

    /**
     * Set/Get value the target variable
     *
     * @param mixed $target
     * @param mixed|View $content
     * @param array|null $data
     *
     * @return Block
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    protected function value(&$target, $content = null, array $data = null)
    {
        if (is_array($content)) {
            extract($content);
        }

        if (!is_null($content)) {
            $target = new Block($content, $data);
        }

        return $target;
    }
}