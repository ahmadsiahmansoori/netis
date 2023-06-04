<?php

namespace app\modules\vehicle\models;

use app\modules\common\models\Cites;
use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCarLookup;
use app\modules\Fanavaran\models\HttpCommon;
use Exception;
use Yii;

/**
 * This is the model class for table "vehicle_kind".
 *
 * @property int $id
 * @property int|null $vehicle_group_id
 * @property int|null $vehicle_system_id
 * @property int|null $vehicle_system_second_id
 * @property int|null $vehicle_system_three_id
 * @property int|null $cylinder_count
 * @property int|null $passenger_count
 * @property float|null $tonnage
 * @property string|null $name_fa
 * @property string|null $name_en
 * @property int|null $active
 * @property string|null $vehicle_category_caption
 * @property string|null $vehicle_system_caption
 *
 * @property VehicleGroup $vehicleGroup
 * @property VehicleSystem $vehicleSystem
 * @property VehicleSystem $vehicleSystemSecond
 * @property VehicleSystem $vehicleSystemThree
 */
class VehicleKind extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle_kind';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_group_id', 'vehicle_system_id', 'vehicle_system_second_id', 'vehicle_system_three_id', 'cylinder_count', 'passenger_count', 'active'], 'integer'],
            [['tonnage'], 'number'],
            [['name_fa', 'name_en', 'vehicle_category_caption', 'vehicle_system_caption'], 'string', 'max' => 255],
            [['vehicle_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleGroup::class, 'targetAttribute' => ['vehicle_group_id' => 'id']],
            [['vehicle_system_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleSystem::class, 'targetAttribute' => ['vehicle_system_id' => 'id']],
            [['vehicle_system_second_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleSystem::class, 'targetAttribute' => ['vehicle_system_secound_id' => 'id']],
            [['vehicle_system_three_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleSystem::class, 'targetAttribute' => ['vehicle_system_three_id' => 'id']],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_group_id' => 'Vehicle Group ID',
            'vehicle_system_id' => 'Vehicle System ID',
            'vehicle_system_second_id' => 'Vehicle System Secound ID',
            'vehicle_system_three_id' => 'Vehicle System Three ID',
            'cylinder_count' => 'Cylinder Count',
            'passenger_count' => 'Passenger Count',
            'tonnage' => 'Tonnage',
            'name_fa' => 'Name Fa',
            'name_en' => 'Name En',
            'active' => 'Active',
            'vehicle_category_caption' => 'Vehicle Category Caption',
            'vehicle_system_caption' => 'Vehicle System Caption',
        ];
    }




    public static function insertFan()
    {
        $http  = new HttpCarLookup();
        $data = $http->vehicleKinds();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = VehicleKind::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new VehicleKind();
                    }

                    $model->name_fa = $kay['caption'];
                    $model->name_en = $kay['name'];
                    if (!empty($kay['vehicle_system_id']))
                    {
                        $model->vehicle_system_id = $kay['vehicle_system_id'] ;
                    }
                    $model->vehicle_group_id = $kay['vehicle_group_id'];
                    $model->cylinder_count = $kay['cylinder_count'];
                    $model->passenger_count = $kay['passenger_count'];
                    $model->tonnage = $kay['tonnage'];
                    $model->vehicle_category_caption = $kay['vehicle_category_caption'];
                    $model->vehicle_system_caption = $kay['vehicle_system_caption'];
                    $model->id = $kay['id'];
                    $model->active = $kay['is_active'];
                    if (!$model->save()) {
                        $trans->rollBack();

                        return [ $model->attributes,$model->errors];
                    }
                }
                $trans->commit();
                return  true;
            }catch (\Exception $err)  {
                $trans->rollBack();

                return  $err->getMessage();
            }

        }
        return  $data;
    }
    

    public function extraFields() {
        return [
            'system' => function() {
                return $this->vehicleSystem;
            },
            'systemSecond' => function() {
                return $this->vehicleSystemSecond;
            },
            'systemThree' => function() {
                return $this->vehicleSystemThree;
            },
            'group' => function() {
                return $this->vehicleGroup;
            },
        ];
   }


    public  static function  setSystemVehicle($id) {
        $trans = Yii::$app->db->beginTransaction();
        try {



            $system = VehicleSystem::findOne($id);

            

            if(empty($system)) {
                $trans->commit();
                return true;
            }



            // for ($i=499; $i < 500 ; $i++) { 
                // $system  = $systems[$i];


            $count_kinds = self::find()->where(['like', 'name_fa' , $system['name_fa']])->count();
                $kinds = self::find()->where(['like', 'name_fa' , $system['name_fa']])->all();
    
    

            
                if($count_kinds > 0) {
                    for ($i=0; $i < $count_kinds; $i++) { 
                        $model = $kinds[$i];
                        
                      

                        try{


                            if(empty($model->vehicle_system_id)) {
                                $model->vehicle_system_id = $system['id'];
                            }
                            else if ($model->vehicle_system_id != $system['id']) {
                                $model->vehicle_system_second_id = $system['id'];
                            }
                            else if($model->vehicle_system_secound_id == $system['id'] &&   $model->vehicle_system_secound_id != $system['id'])
                            {
                                $model->vehicle_system_three_id = $system['id'];
                            }
                            
                           
                            $model->save();

                        }catch(Exception $err) {

                              $trans->rollBack();
                          
                            return $err;
                        }

                       


        
        
                    }
                // }
    
                
    
    
    
            }
            $trans->commit();
            return true;


        } catch(Exception $err) {
            $trans->rollBack();

            return $err;
        }


    }


    /**
     * Gets query for [[VehicleGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleGroup()
    {
        return $this->hasOne(VehicleGroup::class, ['id' => 'vehicle_group_id']);
    }

    /**
     * Gets query for [[VehicleSystem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleSystem()
    {
        return $this->hasOne(VehicleSystem::class, ['id' => 'vehicle_system_id']);
    }

    /**
     * Gets query for [[VehicleSystemSecound]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleSystemSecound()
    {
        return $this->hasOne(VehicleSystem::class, ['id' => 'vehicle_system_secound_id']);
    }

    /**
     * Gets query for [[VehicleSystemThree]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleSystemThree()
    {
        return $this->hasOne(VehicleSystem::class, ['id' => 'vehicle_system_three_id']);
    }
}
