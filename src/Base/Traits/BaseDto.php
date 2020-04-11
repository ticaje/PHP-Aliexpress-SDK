<?php
declare(strict_types=1);

/**
 * Base Infra Class
 * @category    Ticaje
 * @author      Max Demian <ticaje@filetea.me>
 */

namespace Ticaje\AeSdk\Base\Traits;

/**
 * Trait BaseDto
 * @package Ticaje\AeSdk\Base\Traits
 */
trait BaseDto
{
    use Utils;

    /**
     * @param $name
     * @param $arguments
     * @return mixed|BaseDto|void
     */
    public function __call($name, $arguments)
    {
        if ((!$prefix = $this->checkPrefix($name)) || (!($property = $this->checkPropertyExistence($name)))) {
            return;
        }
        return $this->launch($prefix, $property, $arguments);
    }

    /**
     * @param array $data
     * Not intrusive mode
     */
    public function setData(array $data)
    {
        if (is_array($data)) {
            foreach ($data as $property => $vale) {
                $this->set($this->camelize($property), $vale);
            }
        }
    }

    /**
     * @param $prefix
     * @param $property
     * @param $arguments
     * @return mixed|BaseDto
     */
    private function launch($prefix, $property, $arguments)
    {
        return $prefix == 'get' ? $this->get($property) : $this->set($property, $arguments[0]);
    }

    /**
     * @param $name
     * @return bool|string
     */
    private function checkPropertyExistence($name)
    {
        $property = lcfirst(substr($name, 3, strlen($name)));
        return $property;
    }

    /**
     * @param $method
     * @return bool|string
     */
    private function checkPrefix($method)
    {
        $prefix = substr($method, 0, 3);
        return in_array($prefix, array('get', 'set')) ? $prefix : false;
    }

    /**
     * @param $property
     * @param $value
     * @return $this
     */
    private function set($property, $value)
    {
        $this->$property = $value;
        return $this;
    }

    /**
     * @param $property
     * @return mixed
     */
    private function get($property)
    {
        return $this->{$property};
    }
}
