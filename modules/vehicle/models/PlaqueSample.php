<?php

namespace app\modules\vehicle\models;

use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCarLookup;
use Yii;

/**
 * This is the model class for table "plaque_sample".
 *
 * @property int $id
 * @property int|null $plaque_design_id
 * @property int|null $plaque_kind_id
 * @property string|null $plaque_format
 * @property string|null $plaque_serial
 * @property string|null $plaque_sample
 * @property string|null $name_fa
 * @property string|null $name_en
 * @property int|null $active
 */
class PlaqueSample extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plaque_sample';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['plaque_design_id', 'plaque_kind_id', 'active'], 'integer'],
            [['plaque_format', 'plaque_serial', 'plaque_sample', 'name_fa', 'name_en'], 'string', 'max' => 255],
        ];
    }
    public static function insertFan()
    {
        $http  = new HttpCarLookup();
        $data = $http->plaqueSample();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = PlaqueSample::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new PlaqueSample();
                    }
                    $model->name_fa = $kay['caption'];
                    $model->name_en = $kay['name'];
                    $model->plaque_kind_id = $kay['plaque_kind_id'];
                    $model->plaque_design_id = $kay['plaque_design_id'];
                    $model->plaque_format = $kay['plaque_format'];
                    $model->plaque_serial = $kay['plaque_serial'];
                    $model->plaque_sample = $kay['plaque_sample'];
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
            'plaque_design_id' => 'Plaque Design ID',
            'plaque_kind_id' => 'Plaque Kind ID',
            'plaque_format' => 'Plaque Format',
            'plaque_serial' => 'Plaque Serial',
            'plaque_sample' => 'Plaque Sample',
            'name_fa' => 'Name Fa',
            'name_en' => 'Name En',
            'active' => 'Active',
        ];
    }
}
