<?php

namespace app\modules\Fanavaran\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "get_app_token".
 *
 * @property int $id
 * @property string $auth_kay
 * @property string $date
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class GetAppToken extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'get_app_token';
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['auth_kay', 'date'], 'required'],
            [['auth_kay'], 'string'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['date'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [TimestampBehavior::class];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'auth_kay' => 'Auth Kay',
            'date' => 'Date',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
