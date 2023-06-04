<?php

namespace app\modules\Fanavaran\models;

use app\modules\Fanavaran\models\core\Auth;
use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\core\Curl;

class HttpCarLookup
{


    private Auth $auth;
    public function __construct()
    {
        $this->auth = Auth::init();
    }


    # URL_ALLOWED_RELATION_FOR_DISCOUNT_TRANSFER
    public function allowedRelationDiscountTransfer(): array {
        $url = Conf::URL_ALLOWED_RELATION_FOR_DISCOUNT_TRANSFER;
        return $this->request($url);
    }


    # URL_REASON_HAS_NOT_PREVIOUS_POLICY
    public function reasonNoInsurance(): array {
      $url = Conf::URL_REASON_HAS_NOT_PREVIOUS_POLICY;
      return $this->request($url);
    }

    public function covRates(): array {
        $url = Conf::URL_COV_RATES;
        return $this->request($url);
    }

    public function vehicleKinds(): array
    {


        $url = Conf::URL_VEHICLE_KINDS;
        return $this->request($url);

    }

    public function vehicleSystem(): array {
        $url = Conf::URL_VEHICLE_SYSTEM;

        return $this->request($url);
    }

    public function vehicleGroup(): array {
        $url = Conf::URL_VEHICLE_GROUP;
        return $this->request($url);
    }

    public function vehicleType(): array {

        $url = Conf::URL_VEHICLE_TYPE;
        return $this->request($url);
    }

    public function plaqueKinds(): array {
        $url = Conf::URL_PLAQUE_NO_KIND;
        return $this->request($url);
    }

    public function fuelType(): array
    {
        $url = Conf::URL_FUEL_TYPE;
        return $this->request($url);
    }

    public function letterPlaque(): array {
        $url = Conf::URL_VEHICLE_PLAQUE_NO_CODES;
        return $this->request($url);
    }


    public function plaqueDesign(): array {
        $url = Conf::URL_plaque_design;
        return $this->request($url);
    }

    public function plaqueSample(): array {
        $url = Conf::URL_PLAQUE_SAMPLE;
        return $this->request($url);
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