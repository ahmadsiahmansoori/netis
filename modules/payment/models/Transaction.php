<?php

namespace app\modules\payment\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property int $user_id
 * @property int $order_id
 * @property int $order_info_id
 * @property int|null $insurance_line_id
 * @property int|null $insurance_line_category_id
 * @property int $status
 * @property int $payment_type_id
 * @property float|null $final_price
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'order_id', 'order_info_id', 'status', 'payment_type_id'], 'required'],
            [['user_id', 'order_id', 'order_info_id', 'insurance_line_id', 'insurance_line_category_id', 'status', 'payment_type_id', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['final_price'], 'number'],
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
            'order_id' => 'Order ID',
            'order_info_id' => 'Order Info ID',
            'insurance_line_id' => 'Insurance Line ID',
            'insurance_line_category_id' => 'Insurance Line Category ID',
            'status' => 'Status',
            'payment_type_id' => 'Payment Type ID',
            'final_price' => 'Final Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }
}
