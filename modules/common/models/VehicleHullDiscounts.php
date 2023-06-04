<?php

namespace app\modules\common\models;

use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCommon;
use Yii;

/**
 * This is the model class for table "vehicle_hull_discounts".
 *
 * @property int|null $id
 * @property string|null $name
 * @property string|null $from_date
 * @property int|null $to_date
 * @property int|null $active
 */
class VehicleHullDiscounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vehicle_hull_discounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['name', 'to_date','from_date'], 'string', 'max' => 255],
        ];
    }
    public static function insertFan()
    {
        $http  = new HttpCommon();
        $data = $http->vehicleHullDiscount();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = VehicleHullDiscounts::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new VehicleHullDiscounts();
                    }
                    $model->name = $kay['caption'];
                    $model->from_date = $kay['from_date'];
                    $model->to_date = $kay['to_date'];
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
            'name' => 'Name',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'active' => 'Active',
        ];
    }

}
