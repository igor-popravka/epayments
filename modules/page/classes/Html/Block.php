<?php defined('SYSPATH') OR die('No direct access allowed.');

class Html_Block extends Html_View
{
    /**
     * @var string|null
     */
    protected $_content;

    /**
     * Block constructor.
     *
     * @param string|null $content
     * @param array|null $data
     */
    public function __construct($content = null, array $data = null)
    {
        $this->_content = $content;
        $this->_data = $data;
    }

    /**
     * @param mixed|null $content
     *
     * @return Html_Block|mixed|null
     */
    public function content($content = null)
    {
        if (is_null($content)) {
            return $this->_content;
        }

        $this->_content = $content;

        return $this;
    }

    public function render(array $data = []): string
    {
        $content = $this->content();

        if ($content instanceof View) {
            return $content
                ->set($data)
                ->render();
        } else if (is_string($content) && !empty($content)) {
            if (static::isViewFile($content)) {
                return View::factory($content, $this->_data)
                    ->set($data)
                    ->render();
            } else {
                return $content;
            }
        }

        return '';
    }
}