<?php

namespace app\modules\payment\controllers;

use app\modules\Fanavaran\models\core\Curl;
use app\modules\order\models\Order;
use app\modules\order\models\OrderInfoInquiry;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\HttpException;

class PaymentController extends Controller
{



    private const SECRET = '6E01600AD06207B7F0ED8970E554656E19E401F936230A5E81C5F76079B2A33A9FE2114C940E266B9BB505309B2DF2132C403AE715A1A3E86F2CF3D5926F185E0578061CDDAE7ADA049ECD090B98C803A005894BC7AAA9723D783BDC323B2CF6582EE06A32B0CD2A9D37985124A629D0931DFB87BE15026295A98BFA161785D1';

    private const URL_VERIFY = 'https://core.paystar.ir/api/pardakht/verify';
    private const URL_PAYMENT = 'https://core.paystar.ir/api/pardakht/create';
    private const TOKEN = 'xo46glzv5y6d3';


    public function actionCreate() {
        try {

            $req = \Yii::$app->request->post();


            $user_id = \Yii::$app->user->getId();
            $info = OrderInfoInquiry::findOne([
                'user_id' => $user_id,
                'status' => 2,
                'order_id' => $req['order_id'],
                'inquiry_id' => $req['inquiry_id'],
                'detail_id' => $req['detail_id'],
            ]);

            if (empty($info)) {
                throw new HttpException(404 , 'not found ');
            }

            $order = Order::findOne(['id_order' => $info->order_id , 'user_id' => $info->user_id]);

            $final_price = (float) $order->final_price;
            $order_id = $order->id_order;
            $call_back = 'https://ins-api.yarhis.ir/site/call-back';

            $sign =  hash_hmac('SHA512', $final_price.'#'.$order_id.'#'.$call_back, self::SECRET);

            $request_payment = [
                'amount' => $final_price ,
                'order_id' => '24323432',
                'callback' => 'https://ins-api.yarhis.ir/site/call-back', # TODO: set call back url , (response)
                'sign' => $sign,
            ];


            $response = Curl::httpRequest(self::URL_PAYMENT , [
                'Content-Type: ' .  'application/json',
                'Authorization: ' . "Bearer " . self::TOKEN
            ], Curl::POST , json_encode($request_payment));










            return $response;

        }catch (\Exception $err)
        {
            \Yii::$app->response->statusCode = 400;
            return ['status' => false , 'message'=> $err->getMessage() ];
        }
    }


    public function actionCallBack() {

    }

}