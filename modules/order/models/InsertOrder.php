<?php

namespace app\modules\order\models;

use app\modules\bodyPart\models\BodyPartInquiry;
use app\modules\thirdParty\models\ThirdPartyInquiry;
use yii\base\Model;
use yii\web\BadRequestHttpException;

class InsertOrder extends Model
{
    public  $id_order;
    public  $inquiry_id;
    public  $user_id;
    public  $insurance_company_id;
    public  $insurance_line_id;
    public  $insurance_line_category_id;
    public  $status;
    public  $tax;
    public  $toll;
    public  $total_premium;

    private $inqiury ;
    private $toll_inqiury = 0;
    private $tax_inqiury = 0;
    private $price_inqiury = 0;

    public function rules(): array
    {
        return [
            [['user_id' , 'insurance_company_id' , 'inquiry_id'  ,'insurance_line_id', 'insurance_line_category_id', 'status'], 'required'],
            [['user_id', 'insurance_company_id', 'insurance_line_id', 'insurance_line_category_id', 'status'], 'integer'],
            [[ 'tax', 'toll'], 'number'],
            ['inquiry_id' , 'checkExistInquiry']
        ];
    }


    public function checkExistInquiry($attribute , $params =[]) {

        if ($this->insurance_line_id == 5 && $this->insurance_line_category_id  == 4) {
            $this->inqiury = ThirdPartyInquiry::findOne($this->inquiry_id);
            if(empty($this->inqiury) || $this->inqiury->status != 1) {
                $this->addError($attribute , 'not found object inquiry');
            }
            else
            {
                $this->price_inqiury = $this->inqiury->total_premium;
                $this->toll_inqiury = $this->inqiury->toll;
                $this->tax_inqiury = $this->inqiury->tax;
            }

        }
        else if ($this->insurance_line_id == 4 && $this->insurance_line_category_id  == 4) {
            $this->inqiury = BodyPartInquiry::findOne($this->inquiry_id);
            if(empty($this->inqiury) || $this->inqiury->status != 1) {
                $this->addError($attribute , 'not found object inquiry');
            }
            else
            {
                $this->price_inqiury = $this->inqiury->total_premium;
                $this->toll_inqiury = $this->inqiury->toll;
                $this->tax_inqiury = $this->inqiury->tax;
            }

        }
        else
        {
            $this->addError($attribute , 'invalid insurance category');
        }
    }


    public function getInquiry() {
        return $this->inqiury;
    }


    public function priceInquiry()
    {
        return $this->price_inqiury;
    }

    public function taxInquiry() {
        return $this->tax_inqiury;

    }

    public function tollInquiry() {
        return $this->toll_inqiury;
    }


    public function save(): bool
    {
        $order = new Order();
        $order->user_id = $this->user_id;
        $order->insurance_company_id = $this->insurance_company_id; # default company id 1  , bimeh mihan
        $order->insurance_line_id = $this->insurance_line_id; # default id 5 , شخص ثالث
        $order->insurance_line_category_id = $this->insurance_line_category_id; # default id 4 khudro
        $order->status = $this->status ; # default value 1 (namalom)
        $order->insurance_code = null;
        $order->path_doc_insurance = null;
        $order->final_price = $this->total_premium;
        $order->tax =  $this->tax;
        $order->toll = $this->toll;
        $order->price = null;
        if ($order->save()){
            $this->id_order = $order->id_order;
            return true;
        }

        return  false;
    }


}