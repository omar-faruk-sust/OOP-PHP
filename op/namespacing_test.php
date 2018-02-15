<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 1/2/2017
 * Time: 8:32 PM
 */
//one way. this is for procedural php
//require "src/Person.php";
//require "src/Business.php";
//require "src/Staff.php";

require "vendor/autoload.php";

//This is cleaner way to load the classes under the same namespace
use OmarPackage\User\Person;
use OmarPackage\Staff;
use OmarPackage\Business;


// This is one way here to load the namespace by auto-loading
//$omar = new OmarPackage\Person("Omar Faruk");

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