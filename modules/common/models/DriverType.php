<?php

namespace app\modules\common\models;

use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCommon;
use Yii;

/**
 * This is the model class for table "driver_type".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $active
 */
class DriverType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'driver_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }


    public static function insertFan()
    {
        $http  = new HttpCommon();
        $data = $http->driverType();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = DriverType::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new DriverType();
                    }
                    $model->name = $kay['caption'];
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
            'active' => 'Active',
        ];
    }
}
