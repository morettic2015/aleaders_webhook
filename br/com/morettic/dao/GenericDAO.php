<?php

namespace api\dao;

use Medoo\Medoo;

/**
 * Description of GenericDAO
 *
 * @author Morettic LTDA
 */
class GenericDAO {

    const QUERY_BY_SMS = "SELECT id FROM mmk_leads where mobile = '$';";

//put your code here

    private static final function connectDB() {
        return new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'mautic',
            'server' => 'cloud.a-leaders.com',
            'username' => 'r1',
            'password' => 'r4m3m52@123RRR'
        ]);
    }

    /**
     * @see Process response
     */
    public static final function unsubscribe($sms) {
        $dao = self::connectDB();
        $query = str_replace("$", $sms, self::QUERY_BY_SMS);
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
