<?php

namespace app\modules\Fanavaran\models;

use app\modules\Fanavaran\models\core\Auth;
use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\core\Curl;

class HttpThirdParty
{


    private Auth $auth;
    public function __construct()
    {
        $this->auth = Auth::init();
    }




    private function request($url , $type = Curl::GET , $dataPost = null): array
    {


        $headers = [
            'authenticationToken:' . $this->auth->getToken(),
            'CorpId: ' . Conf::CorpId,
            'ContractId: ' . Conf::ContractId,
            'Location: ' . Conf::Location,
        ];




        $response = Curl::httpRequest($url , $headers  );


        if ($response['status_code'] != 200 ) {
            $this->auth->refreshToken();
        }

        $headers = [
            'authenticationToken:' . $this->auth->getToken(),
            'CorpId: ' . Conf::CorpId,
            'ContractId: ' . Conf::ContractId,
            'Location: ' . Conf::Location,
        ];

        $response = Curl::httpRequest($url , $headers , $type , $dataPost );


        if ($response['status_code'] != 200 ) {
            return ['status' => false  , 'response' => $response];
        }

        return ['status' => true  , 'response' => $response['content']];
    }

}