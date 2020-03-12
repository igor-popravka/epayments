<?php defined('SYSPATH') OR die('No direct script access.');

use Page\Block;
use Page\Page as PageModule;

/**
 * Class Page
 *
 * @author Igor Popravka <igor.popravka@tstechpro.com>
 */
class Page extends PageModule
{
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
        return $this->block('title', $content, $data);
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
        return $this->block('menu', $content, $data);
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
        return $this->block('content', $content, $data);
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
        return $this->block('footer', $content, $data);
    }
}