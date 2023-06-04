<?php

namespace app\modules\common\models;

use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCommon;
use Yii;

/**
 * This is the model class for table "insurance_line".
 *
 * @property int $id
 * @property string|null $name_fa
 * @property string|null $name_en
 * @property int|null $active
 *
 * @property DmgCaseType[] $dmgCaseTypes
 */
class InsuranceLine extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'insurance_line';
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
        $http  = new HttpCommon();
        $data = $http->insuranceLInes();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = InsuranceLine::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new InsuranceLine();
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
     * Gets query for [[DmgCaseTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDmgCaseTypes()
    {
        return $this->hasMany(DmgCaseType::class, ['insurance_line_id' => 'id']);
    }
}
