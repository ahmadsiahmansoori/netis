<?php

namespace app\modules\common\models;

use Yii;

/**
 * This is the model class for table "company_insurance_support".
 *
 * @property int|null $id_company_insurance_support
 * @property int|null $insurance_id
 * @property int|null $insurance_line_id
 * @property int|null $insurance_line_category_id
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $delete_mode
 *
 * @property InsuranceCompanies $insurance
 * @property InsuranceLine $insuranceLine
 * @property InsuranceLineCategory $insuranceLineCategory
 */
class CompanyInsuranceSupport extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_insurance_support';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_company_insurance_support', 'insurance_id', 'insurance_line_id', 'insurance_line_category_id', 'status', 'created_at', 'updated_at', 'updated_by', 'created_by', 'delete_mode'], 'integer'],
            [['insurance_line_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => InsuranceLineCategory::class, 'targetAttribute' => ['insurance_line_category_id' => 'id']],
            [['insurance_id'], 'exist', 'skipOnError' => true, 'targetClass' => InsuranceCompanies::class, 'targetAttribute' => ['insurance_id' => 'id_insurance']],
            [['insurance_line_id'], 'exist', 'skipOnError' => true, 'targetClass' => InsuranceLine::class, 'targetAttribute' => ['insurance_line_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_company_insurance_support' => 'Id Company Insurance Support',
            'insurance_id' => 'Insurance ID',
            'insurance_line_id' => 'Insurance Line ID',
            'insurance_line_category_id' => 'Insurance Line Category ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'delete_mode' => 'Delete Mode',
        ];
    }

    /**
     * Gets query for [[Insurance]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInsurance()
    {
        return $this->hasOne(InsuranceCompanies::class, ['id_insurance' => 'insurance_id']);
    }

    /**
     * Gets query for [[InsuranceLine]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInsuranceLine()
    {
        return $this->hasOne(InsuranceLine::class, ['id' => 'insurance_line_id']);
    }

    /**
     * Gets query for [[InsuranceLineCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInsuranceLineCategory()
    {
        return $this->hasOne(InsuranceLineCategory::class, ['id' => 'insurance_line_category_id']);
    }
}
