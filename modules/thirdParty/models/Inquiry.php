<?php

namespace app\modules\thirdParty\models;

use app\modules\Fanavaran\models\core\Auth;
use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\core\Curl;
use yii\base\Model;

class Inquiry extends  Model
{



    public $UsedId;
    public $VehicleKindId;
    #سال ساخت
    public $BuiltYear;
    # تاریخ شروع
    public $BeginDate;
    # تاریخ پایان
    public $EndDate;

    # پوشش مالي
    public $FinancialCov;
    # پوشش حوادث راننده
    public $DriverAccidentsCov;
    # پوشش جاني
    public $LifeCov;

    # تعداد خسارت مالي
    public $FinancialDmgCount;
    # تعداد خسارت جاني
    public $LifeDmgCount;

    # تعداد خسارت حوادث راننده
    public $DriverAccidentsDmgCount;



    # منطقه آزاد
    # cite_id
    public $FreeRegionId;
    # آيا در منطقه آزاد است؟
    public $IsInFreeRegion;

    # يدک
    public $HasSpare;

    # خودرو صفر کیلومتر است؟
    public $IsNewCar;

    # تاريخ شماره گذاري
    public $PlaqueDate;

    # نوع پلاک
    public $PlaqueKindId;

    # sample plaque
    public $PlaqueSampleId;



    # شرکت بيمه قبلي
    public $PreviousInsuranceCorpId;
    # تاريخ شروع بيمه نامه سال قبل
    public $PreviousPolicyBeginDate;
    # تاريخ پايان بيمه نامه سال قبل
    public $PreviousPolicyEndDate;


    # سنوات تخفیف ثالث بیمه نامه قبل
    public $PreviousPolicyDiscountDuration;


    # درصد تخفیف ثالث بیمه نامه قبل
    public $PreviousPolicyDiscountPercent;

    # سنوات تخفیف حوادث راننده بیمه نامه قبل
    public $PreviousPolicyDriverAccidentsDiscountDuration;

    # درصد تخفیف حوادث راننده بیمه نامه قبل
    public $PreviousPolicyDriverAccidentsDiscountPercent;

    # نحوه محاسبه
    public $CalcKindId;


    #تعداد يدک اضافي
    public $SpareCount;
    #تاريخ شماره گذاري يدک
    public $SparePlaqueDate;



    public function rules()
    {
        return [
            [[
                'UsedId',
                'VehicleKindId',
                'IsNewCar',
                'BuiltYear',
                'BeginDate',
                'EndDate',
                'CalcKindId',
                'FinancialCov',
                'FinancialDmgCount',
                'FreeRegionId',
                'HasSpare',
                'SpareCount',
                'SparePlaqueDate',
                'IsInFreeRegion',
                'LifeCov',
                'LifeDmgCount',
                'DriverAccidentsCov',
                'DriverAccidentsDmgCount',
                'PlaqueDate',
                'PlaqueKindId',
                'PlaqueSampleId',
                'PreviousInsuranceCorpId',
                'PreviousPolicyBeginDate',
                'PreviousPolicyEndDate',
                'PreviousPolicyDiscountDuration',
                'PreviousPolicyDiscountPercent',
                'PreviousPolicyDriverAccidentsDiscountDuration',
                'PreviousPolicyDriverAccidentsDiscountPercent',
            ] , 'safe']

        ];
    }





    public function calculate() {
        if($this->validate()) {
            $auth = Auth::init();

            $data = [
                'UsedId' => $this->UsedId,
                'VehicleKindId' => $this->VehicleKindId,
                'IsNewCar' => $this->IsNewCar,
                'BuiltYear' => $this->BuiltYear,
                'BeginDate' => $this->BeginDate,
                'EndDate' => $this->EndDate,
                'CalcKindId' => $this->CalcKindId,
                'FinancialCov' => $this->FinancialCov,
                'FinancialDmgCount' => $this->FinancialDmgCount,
                'FreeRegionId' => $this->FreeRegionId,
                'HasSpare' => $this->HasSpare,
                'SpareCount' => $this->SpareCount,
                'SparePlaqueDate' => $this->SparePlaqueDate,
                'IsInFreeRegion' => $this->IsInFreeRegion,
                'LifeCov' => $this->LifeCov,
                'LifeDmgCount' => $this->LifeDmgCount,
                'DriverAccidentsCov' => $this->DriverAccidentsCov,
                'DriverAccidentsDmgCount' => $this->DriverAccidentsDmgCount,
                'PlaqueDate' => $this->PlaqueDate,
                'PlaqueKindId' => $this->PlaqueKindId,
                'PlaqueSampleId' => $this->PlaqueSampleId,
                'PreviousInsuranceCorpId' => $this->PreviousInsuranceCorpId,
                'PreviousPolicyBeginDate' => $this->PreviousPolicyBeginDate,
                'PreviousPolicyEndDate' => $this->PreviousPolicyEndDate,
                'PreviousPolicyDiscountDuration' => $this->PreviousPolicyDiscountDuration,
                'PreviousPolicyDiscountPercent' => $this->PreviousPolicyDiscountPercent,
                'PreviousPolicyDriverAccidentsDiscountDuration' => $this->PreviousPolicyDriverAccidentsDiscountDuration,
                'PreviousPolicyDriverAccidentsDiscountPercent' => $this->PreviousPolicyDriverAccidentsDiscountPercent
            ];

            $data = json_encode($data);

            $headers = [
                'authenticationToken:' . $auth->getToken(),
                'CorpId: ' . Conf::CorpId,
                'ContractId: ' . Conf::ContractId,
                'Location: ' . Conf::Location,
            ];

             $res = Curl::httpRequest(Conf::URL_INQUIRY , $headers, Curl::POST , $data , true);

             if ($res['status_code'] == 200) {
                 return  $res;
             }
             else if ($res['status_code'] != 200) {
                 $auth->refreshToken();
             }


            $headers = [
                'authenticationToken:' . $auth->getToken(),
                'CorpId: ' . Conf::CorpId,
                'ContractId: ' . Conf::ContractId,
                'Location: ' . Conf::Location,
            ];

            $res = Curl::httpRequest(Conf::URL_INQUIRY , $headers, Curl::POST , $data , true);

            return  $res;
        }
        return false;
    }



}