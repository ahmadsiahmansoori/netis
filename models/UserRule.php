<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_rule".
 *
 * @property int $id
 * @property string|null $caption
 * @property int|null $category_id
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $delete_mode
 */
class UserRule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_rule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'status', 'created_at', 'updated_at', 'delete_mode'], 'integer'],
            [['caption'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'caption' => 'Caption',
            'category_id' => 'Category ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'delete_mode' => 'Delete Mode',
        ];
    }
}
