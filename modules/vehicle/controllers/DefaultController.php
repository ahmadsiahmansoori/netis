<?php



/*
 * TODO:
 *   kose shere action
 */
namespace app\modules\vehicle\controllers;

use app\modules\vehicle\models\changeData\VehicleKindCD;
use app\modules\vehicle\models\changeData\VehicleSystemCD;
use app\modules\vehicle\models\changeData\VehicleUseTypeCD;
use app\modules\vehicle\models\VehicleKind;
use app\modules\vehicle\models\VehicleSystem;
use app\modules\vehicle\models\VehicleUseType;
use Exception;
use yii\web\Controller;
use yii\web\Response as webResponse;

/**
 * Default controller for the `vehicle` module
 */
class DefaultController extends Controller
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


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionSetSystem($id) {
        try {

          $data =   VehicleKind::setSystemVehicle($id);

          if($data === true) {
            return 'ok';
          }



          return $data;

        }
        catch(Exception $err) {
            
            return $err;
        }
    }



    public function actionSystem($id): bool
    {

        $data = VehicleSystem::findOne($id);

        

        $query  = VehicleSystem::find()->select('id , name_fa , active')->where(
            ['like' , 'name_fa' , $data->name_fa]
        )->all();

        if(count($query) > 1) {
            for ($i=1; $i < count($query); $i++) { 
                $model  = VehicleSystem::findOne($query[$i]->id);
                $model->active = 0;
                $model->save();
            }
        }


        return  true;
        
    }


    public function actionSelectUsedVehicle($value): array
    {

        $types = VehicleUseTypeCD::find()->where(['vehicle_group_id' => $value])->all();
        $vehicle = VehicleSystemCD::find()->where(['vehicle_group_id' => $value])->all();

        $data = [];

        $data['usages'] = $types;
        $data['brands'] = $vehicle;

        return $data;
    }


    public function actionSelectKindVehicle($brand , $type) {

        $data = VehicleKindCD::findOne(['vehicle_group_id' => $type , 'active' => 1]);


        switch ($data->tonnage) {
            case !$data->tonnage  :
                $label =  'توناژ';
                break;
            case !$data->tonnage && $data->passenger_count:
                $label =  'ظرفیت';
                break;
            default:
                $label = 'مدل';
                break;
        }


        $kinds = VehicleKindCD::find()->where([
            'OR',
            ['vehicle_system_id' => $brand],
            ['vehicle_system_second_id' => $brand],
            ['vehicle_system_three_id' => $brand],
        ])->andWhere(['active' => 1])->all();



        return [
            'label' => $label,
            'values' => $kinds
        ];


    }
   

}