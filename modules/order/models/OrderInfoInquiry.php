<?php

namespace app\modules\order\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order_info_inquiry".
 *
 * @property int $id
 * @property int $user_id
 * @property int $order_id
 * @property int $insurance_line_id
 * @property int $insurance_line_category_id
 * @property int $inquiry_id
 * @property int $detail_id
 * @property int $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $delete_mode
 * @property Order $order
 */
class OrderInfoInquiry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_info';
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
            [['user_id', 'order_id', 'insurance_line_id', 'insurance_line_category_id', 'inquiry_id', 'status'], 'required'],
            [['user_id', 'order_id', 'insurance_line_id', 'insurance_line_category_id', 'inquiry_id', 'detail_id', 'status', 'created_at', 'updated_at', 'updated_by', 'created_by', 'delete_mode'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'order_id' => 'Order ID',
            'insurance_line_id' => 'Insurance Line ID',
            'insurance_line_category_id' => 'Insurance Line Category ID',
            'inquiry_id' => 'Inquiry ID',
            'detail_id' => 'Detail ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'delete_mode' => 'Delete Mode',
        ];
    }
}
