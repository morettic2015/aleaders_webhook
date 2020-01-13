<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/br/com/morettic/controller/RequestBroker.php';
require __DIR__ . '/br/com/morettic/dao/GenericDAO.php';

use api\broker\RequestBroker;

/*
 * @Remove by SMS
 */

$sms = $_GET['mobile'];
//echo $sms;

echo RequestBroker::unsubscribeIt($sms);


