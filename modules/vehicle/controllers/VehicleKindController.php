<?php

namespace app\modules\vehicle\controllers;

use app\modules\core\MySerializer;
use app\modules\vehicle\models\searchModels\VehicleKindSearchModel;
use app\modules\vehicle\models\VehicleKind;
use Exception;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\Response as webResponse;

class VehicleKindController extends ActiveController
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

//    public $serializer = [
//        'class' => MySerializer::class,
//        'collectionEnvelope' => 'items',
//        'metaEnvelope' => 'pagination'
//    ];
    
    public function actions()
    {

        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }


    public function prepareDataProvider(): ActiveDataProvider
    {

        $model = new VehicleKindSearchModel();
        $model->attributes = \Yii::$app->request->queryParams;
        return  $model->search();

    }



    public $modelClass = VehicleKind::class;


}