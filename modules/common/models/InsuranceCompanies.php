<?php

namespace app\modules\common\models;

use Yii;

/**
 * This is the model class for table "insurance_companies".
 *
 * @property int $id_insurance
 * @property string|null $name
 * @property int|null $code
 * @property int|null $rate
 * @property string|null $path_logo_insurance
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $delete_mode
 *
 * @property CompanyInsuranceSupport[] $companyInsuranceSupports
 */
class InsuranceCompanies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'insurance_companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'rate', 'status', 'created_at', 'updated_at', 'updated_by', 'created_by', 'delete_mode'], 'integer'],
            [['path_logo_insurance'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_insurance' => 'Id Insurance',
            'name' => 'Name',
            'code' => 'Code',
            'rate' => 'Rate',
            'path_logo_insurance' => 'Path Logo Insurance',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'delete_mode' => 'Delete Mode',
        ];
    }

    /**
     * Gets query for [[CompanyInsuranceSupports]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanyInsuranceSupports(): \yii\db\ActiveQuery
    {
        return $this->hasMany(CompanyInsuranceSupport::class, ['insurance_id' => 'id_insurance']);
    }

}
