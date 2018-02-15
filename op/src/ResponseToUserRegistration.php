<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 1/3/2017
 * Time: 8:48 PM
 */
namespace OmarPackage;

interface ResponseToUserRegistration{
    public function userRegisteredSuccessfully();
    public function userRegisteredFailed();
}