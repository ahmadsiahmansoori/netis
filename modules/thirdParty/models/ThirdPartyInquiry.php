<?php

namespace app\modules\thirdParty\models;

use app\models\User;
use app\modules\common\models\changeData\InsuranceCorpCD;
use app\modules\vehicle\models\changeData\PlaqueLetterCD;
use app\modules\vehicle\models\changeData\VehicleGroupCD;
use app\modules\vehicle\models\changeData\VehicleKindCD;
use app\modules\vehicle\models\changeData\VehicleSystemCD;
use app\modules\vehicle\models\changeData\VehicleUseTypeCD;
use app\modules\vehicle\models\VehicleGroup;
use app\modules\common\models\CalcKind;
use app\modules\common\models\Cites;
use app\modules\common\models\InsuranceCorp;
use app\modules\order\models\Order;
use app\modules\vehicle\models\PlaqueKind;
use app\modules\vehicle\models\PlaqueLetter;
use app\modules\vehicle\models\PlaqueSample;
use app\modules\vehicle\models\VehicleKind;
use app\modules\vehicle\models\VehicleSystem;
use app\modules\vehicle\models\VehicleUseType;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "third_party_inquiry".
 *
 * @property int $id
 * @property int|null $fan_inquiry_id
 * @property int|null $user_id
 * @property int|null $status
 * @property int|null $is_ownership_changed
 * @property string|null $discount_history
 * @property int|null $has_damage
 * @property int|null $other_discount_plaque_double_digit
 * @property int|null $other_discount_plaque_triple_digit
 * @property int|null $other_discount_plaque_iran_digit
 * @property int|null $other_discount_plaque_letter_id
 * @property string|null $other_discount_plaque_letter_caption
 * @property int|null $is_new_car
 * @property int|null $has_spare
 * @property int|null $spare_count
 * @property string|null $spare_plaque_date
 * @property int|null $is_in_free_region
 * @property int|null $free_region_id
 * @property float|null $life_cov
 * @property int|null $life_dmg_count
 * @property float|null $life_final_extra_prm
 * @property float|null $driver_accidents_cov
 * @property int|null $driver_accidents_dmg_count
 * @property float|null $driver_accidents_dmg_final_extra_prm
 * @property float|null $driver_accidents_wait_duration
 * @property float|null $final_fund_prm
 * @property float|null $financial_cov
 * @property int|null $financial_dmg_count
 * @property float|null $financial_final_extra_prm
 * @property string|null $plaque_date
 * @property int|null $plaque_kind_id
 * @property int|null $plaque_sample_id
 * @property int|null $policy_driver_accidents_duration
 * @property float|null $policy_driver_accidents_percent
 * @property int|null $policy_third_party_duration
 * @property float|null $policy_third_party_percent
 * @property int|null $previous_insurance_corp_id
 * @property string|null $previous_policy_begin_date
 * @property int|null $previous_policy_discount_duration
 * @property float|null $previous_policy_discount_percent
 * @property int|null $previous_policy_driver_accidents_discount_duration
 * @property float|null $previous_policy_driver_accidents_discount_percent
 * @property string|null $previous_policy_end_date
 * @property string|null $begin_date
 * @property string|null $end_date
 * @property int|null $built_year
 * @property int|null $calc_kind_id
 * @property int|null $vehicle_kind_id
 * @property int|null $vehicle_group_id
 * @property int|null $vehicle_system_id
 * @property int|null $used_id
 * @property float|null $tax
 * @property float|null $total_premium
 * @property float|null $toll
 * @property float|null $third_party_waite_duration
 * @property float|null $third_party_final_prm
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $delete_mode
 *
 * @property CalcKind $calcKind
 * @property Cites $freeRegion
 * @property Order $order
 * @property PlaqueLetter $otherDiscountPlaqueLetter
 * @property PlaqueKind $plaqueKind
 * @property PlaqueSample $plaqueSample
 * @property InsuranceCorp $previousInsuranceCorp
 * @property VehicleUseType $used
 * @property User $user
 * @property VehicleGroup $vehicleGroup
 * @property VehicleKind $vehicleKind
 * @property VehicleSystem $vehicleSystem
 */
class ThirdPartyInquiry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'third_party_inquiry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fan_inquiry_id', 'user_id', 'status', 'is_ownership_changed', 'has_damage', 'other_discount_plaque_double_digit', 'other_discount_plaque_triple_digit', 'other_discount_plaque_iran_digit', 'other_discount_plaque_letter_id', 'is_new_car', 'has_spare', 'spare_count', 'is_in_free_region', 'free_region_id', 'life_dmg_count', 'driver_accidents_dmg_count', 'financial_dmg_count', 'plaque_kind_id', 'plaque_sample_id', 'policy_driver_accidents_duration', 'policy_third_party_duration', 'previous_insurance_corp_id', 'previous_policy_discount_duration', 'previous_policy_driver_accidents_discount_duration', 'built_year', 'calc_kind_id', 'vehicle_kind_id', 'vehicle_group_id', 'vehicle_system_id', 'used_id', 'created_at', 'updated_at', 'delete_mode'], 'integer'],
            [['life_cov', 'life_final_extra_prm', 'driver_accidents_cov', 'driver_accidents_dmg_final_extra_prm', 'driver_accidents_wait_duration', 'final_fund_prm', 'financial_cov', 'financial_final_extra_prm', 'policy_driver_accidents_percent', 'policy_third_party_percent', 'previous_policy_discount_percent', 'previous_policy_driver_accidents_discount_percent', 'tax', 'total_premium', 'toll', 'third_party_waite_duration', 'third_party_final_prm'], 'number'],
            [['discount_history', 'other_discount_plaque_letter_caption', 'spare_plaque_date', 'plaque_date', 'previous_policy_begin_date', 'previous_policy_end_date', 'begin_date', 'end_date'], 'string', 'max' => 255],
            [['calc_kind_id'], 'exist', 'skipOnError' => true, 'targetClass' => CalcKind::class, 'targetAttribute' => ['calc_kind_id' => 'id']],
            [['previous_insurance_corp_id'], 'exist', 'skipOnError' => true, 'targetClass' => InsuranceCorp::class, 'targetAttribute' => ['previous_insurance_corp_id' => 'id']],
            [['plaque_kind_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlaqueKind::class, 'targetAttribute' => ['plaque_kind_id' => 'id']],
            [['other_discount_plaque_letter_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlaqueLetter::class, 'targetAttribute' => ['other_discount_plaque_letter_id' => 'id']],
            [['plaque_sample_id'], 'exist', 'skipOnError' => true, 'targetClass' => PlaqueSample::class, 'targetAttribute' => ['plaque_sample_id' => 'id']],
            [['free_region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cites::class, 'targetAttribute' => ['free_region_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id_user']],
            [['vehicle_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleGroup::class, 'targetAttribute' => ['vehicle_group_id' => 'id']],
            [['vehicle_kind_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleKind::class, 'targetAttribute' => ['vehicle_kind_id' => 'id']],
            [['vehicle_system_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleSystem::class, 'targetAttribute' => ['vehicle_system_id' => 'id']],
            [['used_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleUseType::class, 'targetAttribute' => ['used_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fan_inquiry_id' => 'Fan Inquiry ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'is_ownership_changed' => 'Is Ownership Changed',
            'discount_history' => 'Discount History',
            'has_damage' => 'Has Damage',
            'other_discount_plaque_double_digit' => 'Other Discount Plaque Double Digit',
            'other_discount_plaque_triple_digit' => 'Other Discount Plaque Triple Digit',
            'other_discount_plaque_iran_digit' => 'Other Discount Plaque Iran Digit',
            'other_discount_plaque_letter_id' => 'Other Discount Plaque Letter ID',
            'other_discount_plaque_letter_caption' => 'Other Discount Plaque Letter Caption',
            'is_new_car' => 'Is New Car',
            'has_spare' => 'Has Spare',
            'spare_count' => 'Spare Count',
            'spare_plaque_date' => 'Spare Plaque Date',
            'is_in_free_region' => 'Is In Free Region',
            'free_region_id' => 'Free Region ID',
            'life_cov' => 'Life Cov',
            'life_dmg_count' => 'Life Dmg Count',
            'life_final_extra_prm' => 'Life Final Extra Prm',
            'driver_accidents_cov' => 'Driver Accidents Cov',
            'driver_accidents_dmg_count' => 'Driver Accidents Dmg Count',
            'driver_accidents_dmg_final_extra_prm' => 'Driver Accidents Dmg Final Extra Prm',
            'driver_accidents_wait_duration' => 'Driver Accidents Wait Duration',
            'final_fund_prm' => 'Final Fund Prm',
            'financial_cov' => 'Financial Cov',
            'financial_dmg_count' => 'Financial Dmg Count',
            'financial_final_extra_prm' => 'Financial Final Extra Prm',
            'plaque_date' => 'Plaque Date',
            'plaque_kind_id' => 'Plaque Kind ID',
            'plaque_sample_id' => 'Plaque Sample ID',
            'policy_driver_accidents_duration' => 'Policy Driver Accidents Duration',
            'policy_driver_accidents_percent' => 'Policy Driver Accidents Percent',
            'policy_third_party_duration' => 'Policy Third Party Duration',
            'policy_third_party_percent' => 'Policy Third Party Percent',
            'previous_insurance_corp_id' => 'Previous Insurance Corp ID',
            'previous_policy_begin_date' => 'Previous Policy Begin Date',
            'previous_policy_discount_duration' => 'Previous Policy Discount Duration',
            'previous_policy_discount_percent' => 'Previous Policy Discount Percent',
            'previous_policy_driver_accidents_discount_duration' => 'Previous Policy Driver Accidents Discount Duration',
            'previous_policy_driver_accidents_discount_percent' => 'Previous Policy Driver Accidents Discount Percent',
            'previous_policy_end_date' => 'Previous Policy End Date',
            'begin_date' => 'Begin Date',
            'end_date' => 'End Date',
            'built_year' => 'Built Year',
            'calc_kind_id' => 'Calc Kind ID',
            'vehicle_kind_id' => 'Vehicle Kind ID',
            'vehicle_group_id' => 'Vehicle Group ID',
            'vehicle_system_id' => 'Vehicle System ID',
            'used_id' => 'Used ID',
            'tax' => 'Tax',
            'total_premium' => 'Total Premium',
            'toll' => 'Toll',
            'third_party_waite_duration' => 'Third Party Waite Duration',
            'third_party_final_prm' => 'Third Party Final Prm',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'delete_mode' => 'Delete Mode',
        ];
    }

    /**
     * Gets query for [[CalcKind]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCalcKind()
    {
        return $this->hasOne(CalcKind::class, ['id' => 'calc_kind_id']);
    }


    public function extraFields(): array
    {

        return [
            'vehicleGroup',
            'used',
            'vehicleKind',
            'vehicleSystem',
            'previousInsuranceCorp',
            'plaqueKind',
            'calcKind'
        ];
    }



    public function behaviors()
    {
        return [TimestampBehavior::class];
    }

    /**
     * Gets query for [[FreeRegion]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFreeRegion()
    {
        return $this->hasOne(Cites::class, ['id' => 'free_region_id']);
    }



    /**
     * Gets query for [[OtherDiscountPlaqueLetter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOtherDiscountPlaqueLetter()
    {
        return $this->hasOne(PlaqueLetterCD::class, ['id' => 'other_discount_plaque_letter_id']);
    }

    /**
     * Gets query for [[PlaqueKind]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlaqueKind()
    {
        return $this->hasOne(PlaqueKind::class, ['id' => 'plaque_kind_id']);
    }

    /**
     * Gets query for [[PlaqueSample]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlaqueSample()
    {
        return $this->hasOne(PlaqueSample::class, ['id' => 'plaque_sample_id']);
    }

    /**
     * Gets query for [[PreviousInsuranceCorp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPreviousInsuranceCorp()
    {
        return $this->hasOne(InsuranceCorpCD::class, ['id' => 'previous_insurance_corp_id']);
    }

    /**
     * Gets query for [[Used]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsed()
    {
        return $this->hasOne(VehicleUseTypeCD::class, ['id' => 'used_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id_user' => 'user_id']);
    }

    /**
     * Gets query for [[VehicleGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleGroup()
    {
        return $this->hasOne(VehicleGroupCD::class, ['id' => 'vehicle_group_id']);
    }

    /**
     * Gets query for [[VehicleKind]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleKind()
    {
        return $this->hasOne(VehicleKindCD::class, ['id' => 'vehicle_kind_id']);
    }

    /**
     * Gets query for [[VehicleSystem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleSystem()
    {
        return $this->hasOne(VehicleSystemCD::class, ['id' => 'vehicle_system_id']);
    }
}
