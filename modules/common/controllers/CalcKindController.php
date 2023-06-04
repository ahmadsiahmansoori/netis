<?php

namespace app\modules\common\controllers;

use app\modules\common\models\CalcKind;
use app\modules\common\models\changeData\CalcKindCD;
use app\modules\core\MySerializer;
use yii\rest\ActiveController;
use yii\web\Response as webResponse;

class CalcKindController extends  ActiveController
{

    public $modelClass = CalcKindCD::class;


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



//    public $serializer = [
//        'class' => MySerializer::class,
//        'collectionEnvelope' => 'items',
//        'metaEnvelope' => 'pagination'
//    ];

}