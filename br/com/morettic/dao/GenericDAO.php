<?php

namespace api\dao;

use Medoo\Medoo;

/**
 * Description of GenericDAO
 *
 * @author Morettic LTDA
 */
class GenericDAO {

    const DB_PREFIX = "mmk_";
    const QUERY_BY_SMS = "SELECT id FROM " . self::DB_PREFIX . "leads where mobile like '%$%'";
    const QUERY_BY_EMAIL = "SELECT id FROM " . self::DB_PREFIX . "leads where email = '@';";

    /*
     * Connect to the database
     */

    private static final function connectDB() {
        return new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'mautic',
            'server' => 'localhost',
            'username' => 'r1',
            'password' => 'xxxxxx'
        ]);
    }

    /**
     * @see Process response
     */
    public static final function unsubscribe($sms, $email) {
        $dao = self::connectDB();
        if (!empty($sms)) {
            $query = str_replace(
                    "$",
                    preg_replace("/[^0-9]/", "", $sms),
                    self::QUERY_BY_SMS
            );
        } else {
            $query = str_replace(
                    "@",
                    $email,
                    self::QUERY_BY_EMAIL
            );
        }
        $data = $dao->query($query)->fetchAll();

        $leadID = $data[0]['id'];

        if ($data[0]['id'] > 0) {
            $dao->insert("mmk_lead_donotcontact", [
                "lead_id" => $leadID,
                "date_added" => date('Y-m-d'),
                "channel" => 'sms',
                "reason" => '3',
                'comments' => "from bot action"
            ]);
            $dao->insert("mmk_lead_donotcontact", [
                "lead_id" => $leadID,
                "date_added" => date('Y-m-d'),
                "channel" => 'email',
                "reason" => '3',
                'comments' => "from bot action"
            ]);
            return ['msg' => "Sucess", "code" => 202, 'leadID' => $leadID];
        } else {
            return ['msg' => "Not Found", "code" => 404];
        }
    }

}
