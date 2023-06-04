<?php

namespace app\modules\order\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property int $id_order
 * @property int $user_id
 * @property int $insurance_company_id
 * @property int $insurance_line_id
 * @property int $insurance_line_category_id
 * @property int|null $insurance_code
 * @property int $status
 * @property string|null $path_doc_insurance
 * @property float|null $final_price
 * @property float|null $price
 * @property float|null $tax
 * @property float|null $toll
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $delete_mode
 */
class Order extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
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
            [['user_id', 'insurance_company_id'  ,'insurance_line_id', 'insurance_line_category_id', 'status'], 'required'],
            [['user_id', 'insurance_company_id', 'insurance_line_id', 'insurance_line_category_id', 'insurance_code', 'status', 'created_at', 'updated_at', 'updated_by', 'created_by', 'delete_mode'], 'integer'],
            [['path_doc_insurance'], 'string'],
            [['final_price', 'price', 'tax', 'toll'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_order' => 'Id Order',
            'user_id' => 'User ID',
            'insurance_company_id' => 'Insurance Company ID',
            'insurance_line_id' => 'Insurance Line ID',
            'insurance_line_category_id' => 'Insurance Line Category ID',
            'insurance_code' => 'Insurance Code',
            'status' => 'Status',
            'path_doc_insurance' => 'Path Doc Insurance',
            'final_price' => 'Final Price',
            'price' => 'Price',
            'tax' => 'Tax',
            'toll' => 'Toll',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'delete_mode' => 'Delete Mode',
        ];
    }
}
