<?php

namespace app\modules\common\models;

use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCommon;
use Yii;

/**
 * This is the model class for table "countries".
 *
 * @property int $id
 * @property string|null $name_fa
 * @property string|null $name_en
 * @property int|null $active
 * @property int|null $is_exempt_applying_visa
 * @property string|null $nationality
 */
class Countries extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'countries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active', 'is_exempt_applying_visa'], 'integer'],
            [['name_fa', 'name_en', 'nationality'], 'string', 'max' => 255],
        ];
    }

    public static function insertFan()
    {
        $http  = new HttpCommon();
        $data = $http->countries();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = Countries::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new Countries();
                    }
                    $model->name_fa = $kay['caption'];
                    $model->name_en = $kay['name'];
                    $model->is_exempt_applying_visa = $kay['is_exempt_applying_visa'];
                    $model->nationality = $kay['nationality'];
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
            'is_exempt_applying_visa' => 'Is Exempt Applying Visa',
            'nationality' => 'Nationality',
        ];
    }
}
