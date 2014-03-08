<?php
/**
 * Created by PhpStorm.
 * User: Sergei
 * Date: 02.03.14
 * Time: 0:14
 */

namespace Sapfeer0k\Registry;


class RegistryException extends \Exception {
    const NOT_INSTANTIABLE = 0;
    const VALUE_NOT_FOUND = 1;
}