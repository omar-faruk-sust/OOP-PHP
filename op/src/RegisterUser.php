<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 1/3/2017
 * Time: 8:12 PM
 */

namespace OmarPackage;


class RegisterUser
{
    public function execute(array $data, $listener) {
        var_dump("Registering the user");
        $listener->userRegisteredSuccessfully();
    }
}