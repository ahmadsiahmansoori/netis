<?php

namespace app\modules\vehicle\models;

use app\modules\common\models\InsuranceLine;
use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCarLookup;
use app\modules\Fanavaran\models\HttpCommon;
use Yii;

/**
 * This is the model class for table "vehicle_system".
 *
 * @property int $id
 * @property int|null $vehicle_group_id
 * @property string|null $name_fa
 * @property string|null $name_en
 * @property int|null $active
 *
 * @property VehicleGroup $vehicleGroup
 * @property VehicleKind[] $vehicleKinds
 * @property VehicleKind[] $vehicleKinds0
 * @property VehicleKind[] $vehicleKinds1
 */
class VehicleSystem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle_system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_group_id', 'active'], 'integer'],
            [['name_fa', 'name_en'], 'string', 'max' => 255],
            [['vehicle_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleGroup::class, 'targetAttribute' => ['vehicle_group_id' => 'id']],
        ];
    }

    public static function insertFan()
    {
        $http  = new HttpCarLookup();
        $data = $http->vehicleSystem();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = VehicleSystem::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new VehicleSystem();
                    }
                    $model->name_fa = $kay['caption'];
                    $model->name_en = $kay['name'];
                    $model->vehicle_group_id = $kay['vehicle_group_id'];
                    $model->id = $kay['id'];
                    $model->active = $kay['is_active'];
                    if (!$model->save()) {
                        $trans->rollBack();
                        return $model->errors;
                    }
                }
                $trans->commit();
                return  true;
            }catch (\Exception $err)  {
                $trans->rollBack();
                return  $err;
            }

        }
        return  $data;
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_group_id' => 'Vehicle Group ID',
            'name_fa' => 'Name Fa',
            'name_en' => 'Name En',
            'active' => 'Active',
        ];
    }

    public function extraFields() {
        return [
            'group' => function() {
                return $this->vehicleGroup;
            }
        ];
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
     * Gets query for [[VehicleKinds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleKinds()
    {
        return $this->hasMany(VehicleKind::class, ['vehicle_system_id' => 'id']);
    }

    /**
     * Gets query for [[VehicleKinds0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleKinds0()
    {
        return $this->hasMany(VehicleKind::class, ['vehicle_system_secound_id' => 'id']);
    }

    /**
     * Gets query for [[VehicleKinds1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleKinds1()
    {
        return $this->hasMany(VehicleKind::class, ['vehicle_system_three_id' => 'id']);
    }
}
