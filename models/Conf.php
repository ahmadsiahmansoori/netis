<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "conf".
 *
 * @property int $id
 * @property string $app_name
 * @property string $secret
 * @property string $username
 * @property string $password
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Conf extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'conf';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['app_name', 'secret', 'username', 'password'], 'required'],
            [['created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['app_name', 'secret', 'username', 'password'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'app_name' => 'App Name',
            'secret' => 'Secret',
            'username' => 'Username',
            'password' => 'Password',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
