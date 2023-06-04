<?php

namespace app\modules\vehicle\models;

use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCarLookup;
use Yii;

/**
 * This is the model class for table "plaque_letter".
 *
 * @property int $id
 * @property string|null $letter_plaque_code
 * @property string|null $name_fa
 * @property string|null $name_en
 * @property int|null $active
 */
class PlaqueLetter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plaque_letter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['letter_plaque_code', 'name_fa', 'name_en'], 'string', 'max' => 255],
        ];
    }

    public static function insertFan()
    {
        $http  = new HttpCarLookup();
        $data = $http->letterPlaque();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = PlaqueLetter::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new PlaqueLetter();
                    }
                    $model->name_fa = $kay['caption'];
                    $model->name_en = $kay['name'];
                    $model->letter_plaque_code = $kay['letter_plaque_code'];
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
            'letter_plaque_code' => 'Letter Plaque Code',
            'name_fa' => 'Name Fa',
            'name_en' => 'Name En',
            'active' => 'Active',
        ];
    }
}
