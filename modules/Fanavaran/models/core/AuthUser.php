<?php

namespace app\modules\Fanavaran\models\core;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "auth_user".
 *
 * @property int $id
 * @property string $username
 * @property int $user_id
 * @property string|null $farsi_name
 * @property string $auth_kay
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class AuthUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auth_user';
    }

    public function behaviors()
    {
        return [TimestampBehavior::class];
    }



    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'user_id', 'auth_kay'], 'required'],
            [['user_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['auth_kay'], 'string'],
            [['username', 'farsi_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'user_id' => 'User ID',
            'farsi_name' => 'Farsi Name',
            'auth_kay' => 'Auth Kay',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
