<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 1/2/2017
 * Time: 8:31 PM
 */
namespace OmarPackage\User;
class Person {
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}