<?php

namespace app\modules\thirdParty\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "third_party_detail_driver".
 *
 * @property int $id
 * @property int|null $third_party_detail_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $melli_code
 * @property string|null $certificate_code
 * @property string|null $certificate_date
 * @property string|null $path_certificate_image
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $delete_mode
 */
class ThirdPartyDetailDriver extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'third_party_detail_driver';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['certificate_code' , 'third_party_detail_id'] , 'required'],
            [['third_party_detail_id', 'status', 'created_at', 'updated_at', 'updated_by', 'created_by', 'delete_mode'], 'integer'],
            [['path_certificate_image'], 'string'],
            [['first_name', 'last_name', 'melli_code', 'certificate_code', 'certificate_date'], 'string', 'max' => 255],
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
            'third_party_detail_id' => 'Third Party Detail ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'melli_code' => 'Melli Code',
            'certificate_code' => 'Certificate Code',
            'certificate_date' => 'Certificate Date',
            'path_certificate_image' => 'Path Certificate Image',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'delete_mode' => 'Delete Mode',
        ];
    }
}
