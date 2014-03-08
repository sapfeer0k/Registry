<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 02.03.14
 * Time: 0:11
 */

namespace Sapfeer0k\Registry;


class Registry extends \ArrayObject  {

    /**
     * @var Registry object
     */
    protected static $_instance;

    /**
     * Private constructor
     */
    public function __construct () {
        throw new RegistryException("You can't create registry ");
    }

    /**
     * Standard factory
     *
     * @return \ArrayObject|Registry
     */
    public static function getInstance()
    {
        if (self::$_instance === NULL) {
            self::$_instance = new parent();
        }
        return self::$_instance;
    }

    /**
     * Returns value by it's key or throws an exception
     *
     * @param $name - offset name
     * @throws RegistryException
     */
    public static function get($name)
    {
        if (self::getInstance()->offsetExists($name)) {
            self::getInstance()->offsetGet($name);
        }
        throw new RegistryException("Data for key $name isn't found in storage", RegistryException::VALUE_NOT_FOUND);
    }

    /**
     * Save value in registry with key $name as identifier
     *
     * @param $name - key
     * @param $value - value
     * @return bool
     */
    public static function set($name, $value)
    {
        self::getInstance()->offsetSet($name, $value);
        return true;
    }

    /**
     * Checks, does key $name exist in storage
     *
     * @param $name - key name
     */
    public static function has($name)
    {
        self::getInstance()->offsetExists($name);
    }

    /**
     * Remove value from registry by given key
     *
     * @param $name key name
     * @return bool always
     * @throws RegistryException if value isn't found
     */
    public static function remove($name)
    {
        if (self::getInstance()->offsetExists($name)) {
            self::getInstance()->offsetUnset($name);
            return true;
        }
        throw new RegistryException("Data for key $name isn't found in storage", RegistryException::VALUE_NOT_FOUND);
    }
} 