<?php

namespace app\modules\thirdParty\models;

use app\modules\vehicle\models\VehicleGroup;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "third_party_detail".
 *
 * @property int $id
 * @property int $user_id
 * @property int $third_party_inquiry_id
 * @property int|null $owner_status_vehicle
 * @property string|null $owner_vehicle_melli_code
 * @property string|null $owner_vehicle_hbd_date
 * @property int|null $owner_vehicle_gender
 * @property int|null $owner_has_vehicle_insurance_body
 * @property string|null $other_owner_vehicle_full_name
 * @property string|null $other_owner_vehicle_user_hbd_date
 * @property string|null $other_owner_vehicle_user_code
 * @property int|null $other_plaque_double_digit
 * @property int|null $other_plaque_triple_digit
 * @property int|null $other_plaque_iran_digit
 * @property int|null $other_plaque_letter_id
 * @property string|null $other_plaque_letter_caption
 * @property string|null $path_file_img_front_cart_vehicle
 * @property string|null $path_file_img_back_cart_vehicle
 * @property string|null $vehicle_motor_no
 * @property string|null $vehicle_chassis_no
 * @property string|null $vehicle_vin
 * @property int|null $plaque_double_digit
 * @property int|null $plaque_triple_digit
 * @property int|null $plaque_iran_digit
 * @property int|null $plaque_letter_id
 * @property string|null $plaque_letter_caption
 * @property string|null $email
 * @property string|null $description
 * @property int|null $mention_insurance_status_owner
 * @property int|null $relativity_to_person_transfer_id
 * @property string|null $mention_insurance_call_number
 * @property string|null $other_mention_insurance_user_melli_code
 * @property string|null $other_mention_insurance_user_hbd_date
 * @property int|null $other_mention_insurance_user_gender
 * @property int|null $mention_insurance_province_id
 * @property int|null $mention_insurance_city_id
 * @property string|null $mention_insurance_address
 * @property string|null $mention_insurance_code_post
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $updated_by
 * @property int|null $created_by
 * @property int|null $delete_mode
 *
 * @property VehicleGroup $vehicleGroup
 */
class ThirdPartyDetail extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'third_party_detail';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'third_party_inquiry_id'], 'required'],
            [['user_id', 'third_party_inquiry_id', 'owner_status_vehicle', 'owner_vehicle_gender', 'owner_has_vehicle_insurance_body', 'other_plaque_double_digit', 'other_plaque_triple_digit', 'other_plaque_iran_digit', 'other_plaque_letter_id', 'plaque_double_digit', 'plaque_triple_digit', 'plaque_iran_digit', 'plaque_letter_id', 'mention_insurance_status_owner', 'relativity_to_person_transfer_id', 'other_mention_insurance_user_gender', 'mention_insurance_province_id', 'mention_insurance_city_id', 'status', 'created_at', 'updated_at', 'updated_by', 'created_by', 'delete_mode'], 'integer'],
            [['path_file_img_front_cart_vehicle', 'path_file_img_back_cart_vehicle', 'mention_insurance_address'], 'string'],
            [['owner_vehicle_melli_code', 'owner_vehicle_hbd_date', 'other_owner_vehicle_full_name', 'other_owner_vehicle_user_hbd_date', 'other_owner_vehicle_user_code', 'other_plaque_letter_caption', 'vehicle_motor_no', 'vehicle_chassis_no', 'vehicle_vin', 'plaque_letter_caption', 'email', 'description', 'mention_insurance_call_number', 'other_mention_insurance_user_melli_code', 'other_mention_insurance_user_hbd_date', 'mention_insurance_code_post'], 'string', 'max' => 255],
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
            'third_party_inquiry_id' => 'Third Party Inquiry ID',

            # step one
            'path_file_img_front_cart_vehicle' => 'Path File Img Front Cart Vehicle',
            'path_file_img_back_cart_vehicle' => 'Path File Img Back Cart Vehicle',
            'plaque_double_digit' => 'Plaque Double Digit',
            'plaque_triple_digit' => 'Plaque Triple Digit',
            'plaque_iran_digit' => 'Plaque Iran Digit',
            'plaque_letter_id' => 'Plaque Letter ID',
            'plaque_letter_caption' => 'Plaque Letter Caption',
            'vehicle_motor_no' => 'Vehicle Motor No',
            'vehicle_chassis_no' => 'Vehicle Chassis No',
            'vehicle_vin' => 'Vehicle Vin',

            # step two
            # Drivers

            #step Three
            'owner_status_vehicle' => 'Owner Status Vehicle',
            'owner_vehicle_melli_code' => 'Owner Vehicle Melli Code',
            'owner_vehicle_hbd_date' => 'Owner Vehicle Hbd Date',
            'owner_vehicle_gender' => 'Owner Vehicle Gender',
            'other_owner_vehicle_full_name' => 'name sherkat',
            'other_owner_vehicle_user_hbd_date' => 'tarikh tarkhis',
            'other_owner_vehicle_user_code' => 'shenase meli sherkat',


            # other
            'owner_has_vehicle_insurance_body' => 'Owner Has Vehicle Insurance Body',

            # reject
            'other_plaque_double_digit' => 'Other Plaque Double Digit',
            'other_plaque_triple_digit' => 'Other Plaque Triple Digit',
            'other_plaque_iran_digit' => 'Other Plaque Iran Digit',
            'other_plaque_letter_id' => 'Other Plaque Letter ID',
            'other_plaque_letter_caption' => 'Other Plaque Letter Caption',


            # step four
            'mention_insurance_status_owner' => 'Mention Insurance Status Owner',

            'mention_insurance_call_number' => 'Mention Insurance Call Number',
            'mention_insurance_province_id' => 'Mention Insurance Province ID',
            'mention_insurance_city_id' => 'Mention Insurance City ID',
            'mention_insurance_address' => 'Mention Insurance Address',
            'mention_insurance_code_post' => 'Mention Insurance Code Post',

            'relativity_to_person_transfer_id' => 'Relativity To Person Transfer ID',
            'other_mention_insurance_user_melli_code' => 'Other Mention Insurance User Melli Code',
            'other_mention_insurance_user_hbd_date' => 'Other Mention Insurance User Hbd Date',
            'other_mention_insurance_user_gender' => 'Other Mention Insurance User Gender',



            #step five

            'email' => 'Email',
            'description' => 'Description',


            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
            'created_by' => 'Created By',
            'delete_mode' => 'Delete Mode',
        ];
    }
}
