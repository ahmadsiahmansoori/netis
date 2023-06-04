<?php

namespace app\modules\common\models;

use app\modules\Fanavaran\models\core\Conf;
use app\modules\Fanavaran\models\HttpCommon;
use Yii;

/**
 * This is the model class for table "cites".
 *
 * @property int $id
 * @property int|null $province_id
 * @property int|null $is_in_free_region
 * @property string|null $name_fa
 * @property string|null $name_en
 * @property int|null $active
 *
 * @property Areas[] $areas
 * @property Provinces $province
 */
class Cites extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cites';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['province_id', 'is_in_free_region', 'active'], 'integer'],
            [['name_fa', 'name_en'], 'string', 'max' => 255],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinces::class, 'targetAttribute' => ['province_id' => 'id']],
        ];
    }

    public static function insertFan()
    {
        $http  = new HttpCommon();
        $data = $http->cites();
        if ($data['status'])
        {
            $data = Conf::mapPascalCaseToSnakeCase($data['response']);
            $trans = Yii::$app->db->beginTransaction();
            try {
                foreach ($data as $kay ) {
                    $model = Cites::findOne(['id' => $kay['id']]);
                    if (empty($model))
                    {
                        $model = new Cites();
                    }
                    $model->name_fa = $kay['caption'];
                    $model->name_en = $kay['name'];
                    $model->province_id = $kay['province_id'];
                    $model->is_in_free_region = $kay['is_in_free_region'];
                    $model->id = $kay['id'];
                    $model->active = $kay['is_active'];
                    if (!$model->save()) {
                        $trans->rollBack();
                        return [ $model->attributes,$model->errors];
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
            'province_id' => 'Province ID',
            'is_in_free_region' => 'Is In Free Region',
            'name_fa' => 'Name Fa',
            'name_en' => 'Name En',
            'active' => 'Active',
        ];
    }

    /**
     * Gets query for [[Areas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAreas()
    {
        return $this->hasMany(Areas::class, ['city_id' => 'id']);
    }

    /**
     * Gets query for [[Province]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Provinces::class, ['id' => 'province_id']);
    }
}
