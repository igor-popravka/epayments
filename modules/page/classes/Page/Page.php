<?php

namespace Page;

use Arr;
use Kohana;

/**
 * Class Html_Page
 *
 * @author Igor Popravka <igor.popravka@tstechpro.com>
 */
class Page extends View
{
    /**
     * @var mixed|Block
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
     * Page constructor.
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
     * Create/Get/Set page layout
     *
     * @param null $content
     * @param array|null $data
     *
     * @return View
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function layout($content = null, array $data = null)
    {
        return static::view($this->_layout, $content, $data);
    }

    /**
     * Create/Get/Set page block
     *
     * @param string $name
     * @param null $content
     * @param array|null $data
     *
     * @return Block|View
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function block(string $name, $content = null, array $data = null)
    {
        if (!isset($this->_blocks[$name])) {
            $this->_blocks[$name] = null;
        }

        return static::view($this->_blocks[$name], $content, $data);
    }

    /**
     * Add/Get page alert(s)
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

        $this->_alerts[] = static::view($_, $message)->render();

        return $this;
    }

    /**
     * Add/Get page style(s)
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

        $this->_styles[] = static::view($_, $style)->render();

        return $this;
    }

    /**
     * Add/Get page script(s)
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

        $this->_scripts[] = static::view($_, $script)->render();

        return $this;
    }

    /**
     * Render the page layout
     *
     * @param array $data
     *
     * @return string
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function render(array $data = []): string
    {
        return $this->layout()
            ->set('page', $this)
            ->set($data)
            ->render();
    }

    /**
     * Create/Set/Get page view
     *
     * @param mixed $target
     * @param mixed|View $content
     * @param array|null $data
     *
     * @return View
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    protected static function view(&$target, $content = null, array $data = null): View
    {
        if (is_array($content)) {
            extract($content);
        }

        if (!($target instanceof View) || !is_null($content)) {
            $target = new Block($content, $data);
        }

        return $target;
    }

    /**
     * Load/Get page config
     *
     * @param string|null $key
     *
     * @return array
     * @throws \Kohana_Exception
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
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