<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Class Html_Page
 *
 * @author Igor Popravka <igor.popravka@tstechpro.com>
 */
class Html_Page extends Html_View
{
    /**
     * @var mixed|Html_Block
     */
    protected $_layout;

    /**
     * @var array
     */
    protected $_blocks = [];

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

    /**
     * Html_Page constructor.
     *
     * @param string|null $config
     */
    public function __construct(string $config = null)
    {
        $config = static::config($config);

        $this->layout(Arr::get($config, 'layout'));

        foreach (Arr::get($config, 'blocks', []) as $name => $content) {
            $this->block($name, $content);
        }

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
     * @return Html_View
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function layout($content = null, array $data = null)
    {
        return static::htmlBlock($this->_layout, $content, $data);
    }

    /**
     *
     * @param string $name
     * @param null $content
     * @param array|null $data
     *
     * @return Html_View
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function block(string $name, $content = null, array $data = null)
    {
        if (!isset($this->_blocks[$name])) {
            $this->_blocks[$name] = null;
        }

        return static::htmlBlock($this->_blocks[$name], $content, $data);
    }

    /**
     *
     * @param string|null $message
     *
     * @return $this|array
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function alert(string $message = null)
    {
        if (is_null($message)) {
            return $this->_alerts;
        }

        $this->_alerts[] = static::htmlBlock($_, $message)->render();

        return $this;
    }

    /**
     *
     * @param string|null $style
     *
     * @return $this|array
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function style(string $style = null)
    {
        if (is_null($style)) {
            return $this->_styles;
        }

        $this->_styles[] = static::htmlBlock($_, $style)->render();

        return $this;
    }

    /**
     *
     * @param string|null $script
     *
     * @return $this|array
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function script(string $script = null)
    {
        if (is_null($script)) {
            return $this->_scripts;
        }

        $this->_scripts[] = static::htmlBlock($_, $script)->render();

        return $this;
    }

    public function render(array $data = []): string
    {
        return $this->layout()
            ->set('page', $this)
            ->set($data)
            ->render();
    }

    /**
     * Set/Get value the target variable
     *
     * @param mixed $target
     * @param mixed|Html_View $content
     * @param array|null $data
     *
     * @return Html_View
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    protected static function htmlBlock(&$target, $content = null, array $data = null): Html_View
    {
        if (is_array($content)) {
            extract($content);
        }

        if (!($target instanceof Html_Block) || !is_null($content)) {
            $target = new Html_Block($content, $data);
        }

        return $target;
    }

    protected static function config(string $key = null): array
    {
        $page = Kohana::$config->load('page');
        $common = $page->get(true, []);

        if (is_null($key)) {
            return $common;
        }

        $config = $page->get(strtolower($key), []);

        return Arr::merge($common, $config);
    }
}