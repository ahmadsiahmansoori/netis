<?php

namespace app\modules\vehicle\controllers;

use app\modules\common\models\VehicleHullDiscounts;
use yii\rest\ActiveController;
use yii\web\Response as webResponse;

class VehicleHullDiscountsController extends ActiveController
{

    public function behaviors()
    {
        $parent = parent::behaviors(); // TODO: Change the autogenerated stub

        $parent['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
        ];

        $parent['contentNegotiator'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [ 'application/json' => webResponse::FORMAT_JSON ]
        ];

        return $parent;
    }
    public function actions()
    {

        $actions = parent::actions();
        $actions['index']['pagination'] = false;
        return $actions;
    }

    public $modelClass = VehicleHullDiscounts::class ;

}