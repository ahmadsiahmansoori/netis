<?php

namespace app\modules\thirdParty\controllers;

use app\models\IFileManger;
use app\modules\order\models\Order;
use app\modules\order\models\OrderInfoInquiry;
use app\modules\thirdParty\models\search\query\ThirdPartyDetailQuery;
use app\modules\thirdParty\models\search\ThirdPartyDetailSearchModel;
use app\modules\thirdParty\models\ThirdPartyDetail;
use app\modules\thirdParty\models\ThirdPartyDetailDriver;
use yii\data\ActiveDataProvider;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\ConflictHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response as webResponse;
use yii\web\UploadedFile;

class ThirdPartyController extends ActiveController
{

    public $modelClass = ThirdPartyDetail::class;

    public function behaviors(): array
    {
        $parent = parent::behaviors(); // TODO: Change the autogenerated stub

        $parent['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
        ];

        $parent['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [ 'application/json' => webResponse::FORMAT_JSON ]
        ];

        $parent['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBearerAuth::class,
            ],
            'except' => []
        ];


        return $parent;
    }

    public function actions(): array
    {
        $actions = parent::actions(); // TODO: Change the autogenerated stub
        unset($actions['create']);
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        $actions['view']['findModel'] = [$this, 'oneDataProvider'];
        return $actions;
    }

    public function oneDataProvider($id): ThirdPartyDetail
    {
        $model = ThirdPartyDetail::findOne([
            'id' => $id ,
            'user_id' => \Yii::$app->user->getId()
        ]);

        if (empty($model)) {
            throw new NotFoundHttpException('Object not found: ' . $id);
        }

        return $model;

    }

    public function prepareDataProvider(): ActiveDataProvider
    {

        $model = new ThirdPartyDetailSearchModel();
        $model->attributes = \Yii::$app->request->queryParams;
        $model->user_id = \Yii::$app->user->getId();

        return  $model->search();
    }

    public function actionCreate() {
        try {

            $req = \Yii::$app->request->post();
            $order_info_id = $req['id'];
            $order_id = $req['order_id'];
            $detail = $req['detail'];
            $drivers = $detail['drivers'];


            $info =  OrderInfoInquiry::findOne([
                'user_id' => \Yii::$app->user->getId(),
                'order_id' => $order_id,
                'id' => $order_info_id
            ]);

            if (empty($info)) {
                throw new NotFoundHttpException('Object not found: ' . $order_info_id);
            }

            if (isset($info->detail_id)) {
                throw new ConflictHttpException('Cant attach detail order');
            }

            $order = Order::findOne([
                'id_order' => $order_id,
                'user_id' => \Yii::$app->user->getId(),
            ]);

            if (empty($order)) {
                throw new NotFoundHttpException('Object not found: ' . $order_id);
            }

            if ($order->status != 1) {
                throw new ConflictHttpException('Cant attach detail order , checking status Object Order');
            }

            $trans = \Yii::$app->db->beginTransaction();

            $third_party = new ThirdPartyDetailQuery();
            $third_party->attributes = $detail;
            $third_party->user_id = \Yii::$app->user->getId();
            $third_party->third_party_inquiry_id = $info->inquiry_id;
            $third_party->drivers = $drivers;
            if (!$third_party->save()) {
                $trans->rollBack();
                \Yii::$app->response->statusCode = 422;
                \Yii::$app->response->statusText = $third_party->message();
                return $third_party->errors;
            }

            $info->status = 2;
            $info->detail_id = $third_party->id;
            $order->status = 2;

            if (!$info->save() || !$order->save()) {
                $data = array_merge($info->errors , $order->errors);
                $trans->rollBack();
                \Yii::$app->response->statusCode = 422;
                return $data;
            }

            $trans->commit();
            return $info;

        }catch (\Exception $err) {
            \Yii::$app->response->statusCode = 500;
            return $err->getMessage();
        }
    }

}