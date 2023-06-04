<?php

namespace app\modules\vehicle\models;

use app\modules\common\models\IsAns;
use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCarLookup;
use app\modules\Fanavaran\models\HttpCommon;
use Yii;

/**
 * This is the model class for table "vehicle_group".
 *
 * @property int $id
 * @property string|null $name_fa
 * @property string|null $name_en
 * @property int|null $active
 *
 * @property VehicleKind[] $vehicleKinds
 * @property VehicleSystem[] $vehicleSystems
 * @property VehicleUseType[] $vehicleUseTypes
 */
class VehicleGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['name_fa', 'name_en'], 'string', 'max' => 255],
        ];
    }


    public static function insertFan()
    {
        $http  = new HttpCarLookup();
        $data = $http->vehicleGroup();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = VehicleGroup::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new VehicleGroup();
                    }
                    $model->name_fa = $kay['caption'];
                    $model->name_en = $kay['name'];
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
            'name_fa' => 'Name Fa',
            'name_en' => 'Name En',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[VehicleKinds]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleKinds()
    {
        return $this->hasMany(VehicleKind::class, ['vehicle_group_id' => 'id']);
    }

    /**
     * Gets query for [[VehicleSystems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleSystems()
    {
        return $this->hasMany(VehicleSystem::class, ['vehicle_group_id' => 'id']);
    }

    /**
     * Gets query for [[VehicleUseTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleUseTypes()
    {
        return $this->hasMany(VehicleUseType::class, ['vehicle_group_id' => 'id']);
    }
}
