<?php

namespace app\modules\vehicle\controllers;

use app\modules\vehicle\models\changeData\VehicleFuelCD;
use app\modules\vehicle\models\PlaqueSample;
use app\modules\vehicle\models\VehicleFuelType;
use yii\rest\ActiveController;
use yii\web\Response as webResponse;

class VehicleFuelTypeController extends ActiveController
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

    public $modelClass = VehicleFuelCD::class;



}