<?php

namespace app\modules\common\models;

use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCommon;
use Yii;

/**
 * This is the model class for table "dmg_case_type".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $insurance_line_id
 *
 * @property InsuranceLine $insuranceLine
 */
class DmgCaseType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dmg_case_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['insurance_line_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['insurance_line_id'], 'exist', 'skipOnError' => true, 'targetClass' => InsuranceLine::class, 'targetAttribute' => ['insurance_line_id' => 'id']],
        ];
    }



    public static function insertFan()
    {
        $http  = new HttpCommon();
        $data = $http->dmgCaseType();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = DmgCaseType::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new DmgCaseType();
                    }
                    $model->name = $kay['caption'];
                    $model->id = $kay['id'];
                    $model->insurance_line_id = $kay['insurance_line_id'];
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
            'insurance_line_id' => 'Insurance Line ID',
        ];
    }

    /**
     * Gets query for [[InsuranceLine]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInsuranceLine()
    {
        return $this->hasOne(InsuranceLine::class, ['id' => 'insurance_line_id']);
    }
}
