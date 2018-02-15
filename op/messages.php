<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 1/2/2017
 * Time: 7:40 PM
 */

class Person {
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

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

//one way without constructor of staff class
/*$omar = new Person("Omar Faruk");
$staff = new Staff();
$itBusiness = new Business($staff);
$itBusiness->hire($omar);
var_dump($staff); die;*/

//another way without constructor of staff class
$omar = new Person("Omar Faruk");
$rishat = new Person("Ratul Rishat");
$staff = new Staff();
//business has dependency on staff
$itBusiness = new Business($staff);
//business will hire person as staf
$itBusiness->hire($omar);
$itBusiness->hire($rishat);

// both will dump the same result
var_dump($staff);
var_dump($itBusiness->getStaffmembers());

die;