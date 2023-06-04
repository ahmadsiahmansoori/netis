<?php

namespace app\modules\Fanavaran\models\core;


class Conf
{


    # PUBLIC BASE URL
    const BASE_URL = 'https://bime.net.iraneit.com:3023/BimeApiManager_Release';



    #Sales ACCOUNT
    public const APP_NAME = 'Sales';
    public const SECRET = 'aA@12345';
    public const USER_NAME = 'MIhanUser';
    public const PASSWORD = 'mihanzxc123';


    public const CorpId = '1438';
    public const ContractId = '2';
    public const Location = '1';

    # 'https://bime.net.iraneit.com:3023/BimeApiManager_Release/api/EITAuthentication/GetAppToken'
    public const GET_APP_TOKEN = self::BASE_URL . '/api/EITAuthentication/GetAppToken';
    public const LOGIN = self::BASE_URL . '/api/EITAuthentication/Login';

    # vehicle
    public const URL_VEHICLE_KINDS =  self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/vehicle-kinds';

    public const URL_VEHICLE_GROUP = self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/vehicle-groups';

    public const URL_VEHICLE_TYPE = self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/vehicle-use-types';

    public const URL_VEHICLE_SYSTEM = self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/vehicle-systems';

    # plaque

    public const URL_PLAQUE_NO_KIND = self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/vehicle-plaque-no-kinds';
    public const URL_VEHICLE_PLAQUE_NO_CODES = self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/vehicle-plaque-no-codes';
    public const URL_plaque_design = self::BASE_URL . '/Api/BimeApi/V2.0/Car/code-list/plaque-design';
    public const URL_PLAQUE_SAMPLE = self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/vehicle-plaque-no-samples';




    public const URL_COV_RATES = self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/cov-rates'; # poshesh maliController

    public const URL_FUEL_TYPE = self::BASE_URL . '/Api/BimeApi/v2.0/car/code-list/fuel-type';

    public const URL_ALLOWED_RELATION_FOR_DISCOUNT_TRANSFER = self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/allowed-relations-for-discount-transfer';


    public const URL_REASON_HAS_NOT_PREVIOUS_POLICY = self::BASE_URL . '/Api/BimeApi/v2.0/car/code-list/reason-has-not-previous-policy';



    #





    # common fanavaran url api




    public const URL_INSURANCE_CORP = self::BASE_URL . '/Api/BimeApi/V2.0/common/code-list/insurance-corp';
    public const URL_INSURANCE_LINES = self::BASE_URL . '/Api/BimeApi/v2.0/common/base-info/insurance-lines';
    public const URL_INSURANCE_LINES_category = self::BASE_URL . '/Api/BimeApi/v2.0/common/base-info/insurance-line-categoreis';
    public const URL_DMG_CASE_TYPES = self::BASE_URL . '/Api/BimeApi/v2.0/common/base-info/dmg-case-types';


    public const URL_ANS  = self::BASE_URL . '/Api/BimeApi/v2.0/Common/code-list/ans';
    public const URL_HAS = self::BASE_URL . '/Api/BimeApi/v2.0/Common/code-list/has';
    public const URL_POLICY_FINAL_STATUS = self::BASE_URL . '/Api/BimeApi/V2.0/common/code-list/policy-final-status';



    public const URL_COUNTRIES = self::BASE_URL . '/Api/BimeApi/v2.0/common/base-info/countries';
    public const URL_PROVINCES = self::BASE_URL . '/Api/BimeApi/v2.0/common/base-info/Provinces';
    public const URL_CITES = self::BASE_URL . '/Api/BimeApi/v2.0/common/base-info/cities';
    public const URL_MUNICIPAL_AREAS = self::BASE_URL . '/Api/BimeApi/v2.0/common/base-info/municipal-areas';




    # body part

    public const URL_LOSSES_HISTORY = self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/losses-history';
    public const URL_ADDITIONAL_COV = self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/additional-covs';
    public const URL_BASIC_COV = self::BASE_URL .  '/Api/BimeApi/v2.0/car/base-info/basic-covs';
    public const URL_COV_RATE = self::BASE_URL . '/Api/BimeApi/v2.0/car/base-info/cov-rates';
    public const URL_DRIVER_TYPE = self::BASE_URL . '/api/BimeApi/v2.0/Car/code-list/driver-type';
    public const URL_VEHICLE_HULL_DISCOUNT = self::BASE_URL . '/api/BimeApi/v2.0/car/base-info/vehicle-hull-discounts';


    #third party
    public const URL_INQUIRY = self::BASE_URL . '/Api/BimeApi/v2.0/car/third-party-car-policy-quotes';

    public const URL_CALC_KIND = self::BASE_URL . '/Api/BimeApi/v2.0/common/code-list/calc-kind';

    public const URL_ACCESSORY_KIND = self::BASE_URL . '/api/BimeApi/v2.0/Car/base-info/accessory-kinds';

    #body part
    public const URL_INQUIRY_BODY = self::BASE_URL . '/Api/BimeApi/v2.0/car/vehicle-hull-quotes';

    public static function mapPascalCaseToSnakeCase($data)
    {

        if (empty($data))
        {
            return  null;
        }

        $new_data = [];




        foreach ($data as $k => $value)
        {

            $d= [];

            if (is_array($value))
            {

                foreach ($value as $kay => $v)
                {
                    $x = ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $kay)), '_');
                    $d[$x] = $v;
                }
                $new_data[] = $d;

            }
            else {
                $x = ltrim(strtolower(preg_replace('/[A-Z]([A-Z](?![a-z]))*/', '_$0', $k)), '_');
                $new_data[$x] = $value;

            }
        }
        return $new_data;
    }
}