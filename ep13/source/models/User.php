<?php

namespace Source\models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class User
 * @package Source\models
 */
class User extends DataLayer
{
    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct("users", ["first_name", "last_name"]);
    }
}