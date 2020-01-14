<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/br/com/morettic/controller/RequestBroker.php';
require __DIR__ . '/br/com/morettic/dao/GenericDAO.php';

use api\broker\RequestBroker;

/*
 * @Remove by SMS
 */

$json = json_encode($_GET);

$fp = fopen(__DIR__ .'lidn'.date('d-m-y-h-s-i').'.log', 'w+');
fwrite($fp, $json);
fclose($fp);
$sms = $_GET['mobile'];
$email = $_GET['email'];

echo RequestBroker::unsubscribeIt($sms,$email);


