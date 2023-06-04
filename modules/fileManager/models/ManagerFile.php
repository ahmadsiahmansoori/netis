<?php

namespace app\modules\fileManager\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "manager_file".
 *
 * @property int $id
 * @property int $user_id
 * @property string $path
 * @property string|null $link
 * @property int|null $insurance_line
 * @property string|null $tag
 * @property string|null $name
 * @property string|null $description
 * @property number|null $status
 * @property string|null $extension
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class ManagerFile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manager_file';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'path'], 'required'],
            [['user_id', 'insurance_line' , 'status', 'created_at', 'updated_at'], 'integer'],
            [['path', 'description'], 'string'],
            [['link', 'tag', 'name', 'extension'], 'string', 'max' => 255],
        ];
    }

    public function  fields()
    {
        return [
            'link',
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
            'user_id' => 'User ID',
            'path' => 'Path',
            'link' => 'Link',
            'insurance_line' => 'Insurance Line',
            'tag' => 'Tag',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
            'extension' => 'Extension',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
