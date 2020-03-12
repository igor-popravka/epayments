<?php

namespace Page;

/**
 * Class View
 *
 * @author Igor Popravka <igor.popravka@tstechpro.com>
 */
abstract class View
{
    /**
     * @var array|null
     */
    protected $_data;

    /**
     * Render a view of the block with data
     *
     * @param array|null $data
     *
     * @return string
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    abstract public function render(array $data = []): string;

    /**
     * Set the parameter of the data
     *
     * @param mixed $key
     * @param null $value
     *
     * @return $this
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function set($key, $value = null)
    {
        if (is_array($key) || $key instanceof \Traversable) {
            foreach ($key as $name => $value) {
                $this->_data[$name] = $value;
            }
        } else if (is_scalar($key)) {
            $this->_data[$key] = $value;
        }

        return $this;
    }

    /**
     * Get the parameter of the data
     *
     * @param mixed $key
     * @param null $default
     *
     * @return $this
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function get($key, $default = null)
    {
        return $this->_data[$key] ?? $default;
    }

    /**
     * Convert object to string
     *
     * @return string
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * Check if the file exist in view template
     *
     * @param string $file
     *
     * @return bool
     * @author Igor Popravka <igor.popravka@tstechpro.com>
     */
    public static function isViewFile(string $file): bool
    {
        return !empty(\Kohana::find_file('views', $file));
    }
}