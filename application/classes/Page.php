<?php defined('SYSPATH') OR die('No direct script access.');

class Page extends Html_Page
{
    /**
     *
     * @param null $content
     * @param array|null $data
     *
     * @return Html_View
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function title($content = null, array $data = null)
    {
        return static::htmlBlock($this->_blocks['title'], $content, $data);
    }

    /**
     *
     * @param null $content
     * @param array|null $data
     *
     * @return Html_View
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function menu($content = null, array $data = null)
    {
        return static::htmlBlock($this->_blocks['menu'], $content, $data);
    }

    /**
     *
     * @param null $content
     * @param array|null $data
     *
     * @return Html_View
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function content($content = null, array $data = null)
    {
        return static::htmlBlock($this->_blocks['content'], $content, $data);
    }

    /**
     *
     * @param null $content
     * @param array|null $data
     *
     * @return Html_View
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function footer($content = null, array $data = null)
    {
        return static::htmlBlock($this->_blocks['footer'], $content, $data);
    }
}