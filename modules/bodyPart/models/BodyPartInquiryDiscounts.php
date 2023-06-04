<?php

namespace app\modules\bodyPart\models;

use Yii;

/**
 * This is the model class for table "body_part_inquiry_discounts".
 *
 * @property int $id
 * @property int $body_part_inquiry_id
 * @property int|null $discount_id
 * @property int|null $other_discount_id
 * @property float|null $rate
 * @property int|null $personnel_id
 * @property float|null $cov_rate
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $delete_mode
 */
class BodyPartInquiryDiscounts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'body_part_inquiry_discounts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['body_part_inquiry_id'], 'required'],
            [['body_part_inquiry_id', 'discount_id', 'other_discount_id', 'personnel_id', 'created_at', 'updated_at', 'delete_mode'], 'integer'],
            [['rate', 'cov_rate'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'body_part_inquiry_id' => 'Body Part Inquiry ID',
            'discount_id' => 'Discount ID',
            'other_discount_id' => 'Other Discount ID',
            'rate' => 'Rate',
            'personnel_id' => 'Personnel ID',
            'cov_rate' => 'Cov Rate',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'delete_mode' => 'Delete Mode',
        ];
    }
}
