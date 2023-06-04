<?php

namespace app\modules\Fanavaran\models;

use app\modules\Fanavaran\models\core\Auth;
use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\core\Curl;

class HttpCommon
{



    private Auth $auth;
    public function __construct()
    {
        $this->auth = Auth::init();
    }



    #URL_INSURANCE_CORP
    public function insuranceCorp(): array
    {
        $url = Conf::URL_INSURANCE_CORP;
        return $this->request($url);
    }


    public function insuranceLInesCategory(): array
    {
        $url = Conf::URL_INSURANCE_LINES_category ;
        return $this->request($url);
    }



    # URL_INSURANCE_LINES

    public function insuranceLInes(): array
    {
        # رشته ها بیمه
        $url = Conf::URL_INSURANCE_LINES;
        return  $this->request($url);
    }

    public function dmgCaseType(): array
    {
        $url = Conf::URL_DMG_CASE_TYPES;
        return $this->request($url);
    }



    public function provinces(): array
    {
        $url =Conf::URL_PROVINCES;
        return $this->request($url);
    }

    public function cites(): array
    {
        $url =Conf::URL_CITES;
        return $this->request($url);
    }


    public function countries(): array
    {
        $url =Conf::URL_COUNTRIES;
        return $this->request($url);
    }


    public function areas(): array
    {
        $url = Conf::URL_MUNICIPAL_AREAS;
        return $this->request($url);
    }

    # URL_POLICY_FINAL_STATUS
    public function insuranceFinalStatus(): array
    {
        $url = Conf::URL_POLICY_FINAL_STATUS;
        return $this->request($url);
    }


    public function calcKind(): array
    {
        $url = Conf::URL_CALC_KIND;
        return $this->request($url);
    }
    public function ans(): array
    {
        $url = Conf::URL_ANS;
        return $this->request($url);
    }



    public function has(): array
    {
        $url = Conf::URL_HAS;
        return $this->request($url);
    }


    public function lossesHistory(): array
    {
        $url = Conf::URL_LOSSES_HISTORY;
        return $this->request($url);
    }

    public function additionalCov(): array
    {
        $url = Conf::URL_ADDITIONAL_COV;
        return $this->request($url);
    }

    public function basicCov(): array
    {
        $url = Conf::URL_BASIC_COV;
        return $this->request($url);
    }

    public function covRate(): array
    {
        return $this->request(Conf::URL_COV_RATE);
    }

    public function driverType(): array
    {
        return $this->request(Conf::URL_DRIVER_TYPE);
    }

    public function vehicleHullDiscount(): array
    {
        return $this->request(Conf::URL_VEHICLE_HULL_DISCOUNT);
    }


    public function accessoryKind(): array
    {
        return $this->request(Conf::URL_ACCESSORY_KIND);
    }




    private function request($url): array
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

        $response = Curl::httpRequest($url , $headers  );

        if ($response['status_code'] != 200 ) {
            return ['status' => false  , 'response' => $response];
        }

        return ['status' => true  , 'response' => $response['content']];
    }



}