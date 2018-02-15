<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 1/3/2017
 * Time: 8:31 PM
 */
require "vendor/autoload.php";

$registration = new \OmarPackage\RegisterUser();
$auth = new \OmarPackage\AuthController($registration);

$auth->register();