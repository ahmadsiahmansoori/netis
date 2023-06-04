<?php

namespace app\modules\payment\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int|null $transaction_id
 * @property int|null $user_id
 * @property int|null $order_id
 * @property int|null $order_info_id
 * @property int|null $insurance_line_id
 * @property int|null $insurance_line_category_id
 * @property string|null $call_back_url
 * @property string|null $redirect_url
 * @property int|null $pm_status
 * @property int|null $pm_call_back_status
 * @property string|null $pm_token
 * @property string|null $pm_message
 * @property string|null $pm_ref_num
 * @property string|null $pm_order_id
 * @property float|null $pm_payment_amount
 * @property string|null $pm_response_json
 * @property string|null $pm_card_number
 * @property string|null $pm_transaction_id
 * @property string|null $pm_tracking_code
 * @property string|null $pm_ref_number
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transaction_id', 'user_id', 'order_id', 'order_info_id', 'insurance_line_id', 'insurance_line_category_id', 'pm_status', 'pm_call_back_status', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['call_back_url', 'redirect_url', 'pm_token', 'pm_response_json'], 'string'],
            [['pm_payment_amount'], 'number'],
            [['pm_message', 'pm_ref_num', 'pm_order_id', 'pm_card_number', 'pm_transaction_id', 'pm_tracking_code', 'pm_ref_number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'transaction_id' => 'Transaction ID',
            'user_id' => 'User ID',
            'order_id' => 'Order ID',
            'order_info_id' => 'Order Info ID',
            'insurance_line_id' => 'Insurance Line ID',
            'insurance_line_category_id' => 'Insurance Line Category ID',
            'call_back_url' => 'Call Back Url',
            'redirect_url' => 'Redirect Url',
            'pm_status' => 'Pm Status',
            'pm_call_back_status' => 'Pm Call Back Status',
            'pm_token' => 'Pm Token',
            'pm_message' => 'Pm Message',
            'pm_ref_num' => 'Pm Ref Num',
            'pm_order_id' => 'Pm Order ID',
            'pm_payment_amount' => 'Pm Payment Amount',
            'pm_response_json' => 'Pm Response Json',
            'pm_card_number' => 'Pm Card Number',
            'pm_transaction_id' => 'Pm Transaction ID',
            'pm_tracking_code' => 'Pm Tracking Code',
            'pm_ref_number' => 'Pm Ref Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
        ];
    }

    public function behaviors()
    {
        return [TimestampBehavior::class];
    }
}
