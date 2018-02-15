<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 1/2/2017
 * Time: 8:31 PM
 */

namespace OmarPackage;
//Here we are using the Person class in global space rather then under the namespace
use OmarPackage\User\Person;

class Business {
    protected $staff;

    // This is called type hinting. Here i am passing Staf obj in constructor
    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    public function hire(Person $person) {
        // add the person to the staf collection
        $this->staff->add($person);
    }

    public function getStaffmembers(){
        return $this->staff->getMembers();
    }
}