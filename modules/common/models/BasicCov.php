<?php

namespace app\modules\common\models;

use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCommon;
use Yii;

/**
 * This is the model class for table "basic_cov".
 *
 * @property int|null $id
 * @property string|null $name_fa
 * @property string|null $name_en
 * @property int|null $is_online_sale
 * @property int|null $active
 */
class BasicCov extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'basic_cov';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_online_sale', 'active'], 'integer'],
            [['name_fa', 'name_en'], 'string', 'max' => 255],
        ];
    }

    public static function insertFan()
    {
        $http  = new HttpCommon();
        $data = $http->basicCov();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = BasicCov::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new BasicCov();
                    }
                    $model->name_fa = $kay['caption'];
                    $model->is_online_sale = $kay['is_online_sale'];
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
            'is_online_sale' => 'Is Online Sale',
            'active' => 'Active',
        ];
    }
}
