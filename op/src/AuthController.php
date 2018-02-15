<?php
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 1/3/2017
 * Time: 8:07 PM
 */

namespace OmarPackage;


class AuthController implements ResponseToUserRegistration
{
    protected $registration;

    /**
     * This is actually constructor level injection.
     * If multiple times this obj instance is used then use constructor injection
     * AuthController constructor.
     * @param RegisterUser $registration
     */
    public function __construct(RegisterUser $registration)
    {
        $this->registration = $registration;
    }

    /**
     * This is actually method level inejction
     * @param RegisterUser $registration
     */
//    public function register(RegisterUser $registration) {
//        $registration->execute([]);
//    }

    public function register() {
        // Here we are passing the current instace of AuthClass otherwise
        // we need to do instance injection in RegisterUser Class also
        // By passing $this we can call the userRegisteredSuccessfully() from RegisterUser class
        $this->registration->execute([],$this);
    }

    public function userRegisteredSuccessfully() {
        var_dump("Successfully registered the user. Redirect somewhere else");
    }

    public function userRegisteredFailed() {
        var_dump("Redirect back");
    }
}