<?php

namespace api\dao;

use Medoo\Medoo;

/**
 * Description of GenericDAO
 *
 * @author Morettic LTDA
 */
class GenericDAO {

//put your code here

    public static final function connectDB() {

        $database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'name',
            'server' => 'localhost',
            'username' => 'your_username',
            'password' => 'your_password'
        ]);

        return $database;
    }

}
