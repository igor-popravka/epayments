<?php

namespace Page;

use View as BaseView;

/**
 * Class Block
 *
 * @author Igor Popravka <igor.popravka@tstechpro.com>
 */
class Block extends View
{
    /**
     * @var string|null
     */
    protected $_content;

    /**
     * Block constructor.
     *
     * @param mixed $content
     * @param array|null $data
     */
    public function __construct($content = null, array $data = null)
    {
        $this->_content = $content;
        $this->_data = $data;
    }

    /**
     * Get/Set block content
     *
     * @param mixed $content
     *
     * @return Block|BaseView|null
     */
    public function content($content = null)
    {
        if (is_null($content)) {
            return $this->_content;
        }

        $this->_content = $content;

        return $this;
    }

    /**
     * Render block content with data
     *
     * @param array $data
     *
     * @return string
     * @throws \View_Exception
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function render(array $data = []): string
    {
        $content = $this->content();

        if ($content instanceof BaseView) {
            return $content
                ->set($data)
                ->render();
        } else if (is_string($content) && !empty($content)) {
            if (static::isViewFile($content)) {
                return BaseView::factory($content, $this->_data)
                    ->set($data)
                    ->render();
            } else {
                return $content;
            }
        }

        return '';
    }
}