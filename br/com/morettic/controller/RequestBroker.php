<?php

namespace api\broker;

use api\dao\GenericDAO;

/**
 * Description of RequestBroker
 *
 * @author Morettic LTDA
 */
class RequestBroker extends \stdClass {

    private static final function init() {
        // Set required headers
        header('Content-Type: application/json; charset=utf-8');
        header('Access-Control-Allow-Origin: *');
    }

    //put your code here
    public static final function unsubscribeIt($sms,$email) {
        self::init();
        $response = GenericDAO::unsubscribe($sms,$email);
        return json_encode($response);
    }

}
