<?php defined('SYSPATH') OR die('No direct access allowed.');

class Block
{
    /**
     * @var string|null
     */
    protected $_content;

    /**
     * @var array|null
     */
    protected $_data;

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
     * @return Block|mixed|null
     */
    public function content($content = null)
    {
        if (is_null($content)) {
            return $this->_content;
        }

        $this->_content = $content;

        return $this;
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

    public function render(): string
    {
        $content = $this->content();

        if ($content instanceof View) {
            if (!empty($this->_data)) {
                $content->set($this->_data);
            }

            return $content->render();
        } else if (is_string($content) && !empty($content)) {
            if ($this->isViewFile($content)) {
                return View::factory($content, $this->_data)->render();
            } else {
                return $content;
            }
        }

        return '';
    }

    protected function isViewFile(string $file): bool
    {
        return !empty(Kohana::find_file('views', $file));
    }
}