<?php

namespace app\modules\common\controllers;

use app\modules\common\models\Cites;
use app\modules\common\models\searchModels\CitySearchModel;
use app\modules\common\models\searchModels\InsuranceCorpSearchModel;
use app\modules\core\MySerializer;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\web\Response as webResponse;

class CityController extends ActiveController
{
    public $modelClass = Cites::class;
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


    public function actions(): array
    {

        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        return $actions;
    }


    public function prepareDataProvider(): ActiveDataProvider
    {

        $model = new CitySearchModel();
        $model->attributes = \Yii::$app->request->queryParams;
        return  $model->search();

    }

}