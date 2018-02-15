<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 1/2/2017
 * Time: 8:31 PM
 */
namespace OmarPackage;

use OmarPackage\User\Person;

class Staff {
    protected $members = [];

    public function __construct($members = [])
    {
        $this->members = $members;
    }

    public function add(Person $person){
        $this->members[] = $person;
    }

    public function getMembers() {
        return $this->members;
    }
}