<?php

namespace app\modules\vehicle\models;

use app\modules\common\models\InsuranceLine;
use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCarLookup;
use app\modules\Fanavaran\models\HttpCommon;
use Yii;

/**
 * This is the model class for table "vehicle_use_type".
 *
 * @property int $id
 * @property int|null $vehicle_group_id
 * @property string|null $name_fa
 * @property string|null $name_en
 * @property int|null $active
 *
 * @property VehicleGroup $vehicleGroup
 */
class VehicleUseType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle_use_type';
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
        $data = $http->vehicleType();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = VehicleUseType::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new VehicleUseType();
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

    /**
     * Gets query for [[VehicleGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleGroup()
    {
        return $this->hasOne(VehicleGroup::class, ['id' => 'vehicle_group_id']);
    }
}
