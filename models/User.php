<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id_user
 * @property int|null $rule_id
 * @property int|null $access_id
 * @property int|null $status
 * @property int|null $call_number
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $delete_mode
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rule_id', 'access_id', 'status', 'call_number', 'created_at', 'updated_at', 'delete_mode'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'rule_id' => 'Rule ID',
            'access_id' => 'Access ID',
            'status' => 'Status',
            'call_number' => 'Call Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'delete_mode' => 'Delete Mode',
        ];
    }
}
