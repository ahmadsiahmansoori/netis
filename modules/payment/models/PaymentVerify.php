<?php

namespace app\modules\payment\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "payment_verify".
 *
 * @property int $id
 * @property int|null $payment_id
 * @property int|null $status
 * @property string|null $message
 * @property string|null $response_json
 * @property float|null $price
 * @property string|null $ref_num
 * @property string|null $card_number
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted_at
 */
class PaymentVerify extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_verify';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_id', 'status', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['response_json'], 'string'],
            [['price'], 'number'],
            [['message', 'ref_num', 'card_number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_id' => 'Payment ID',
            'status' => 'Status',
            'message' => 'Message',
            'response_json' => 'Response Json',
            'price' => 'Price',
            'ref_num' => 'Ref Num',
            'card_number' => 'Card Number',
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
