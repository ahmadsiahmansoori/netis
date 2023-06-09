import { Ans } from "../../public/interface/Ans"
import { CalcKind } from "../../public/interface/CalcKind"
import { InsuranceCorp } from "../../public/interface/InsuranceCorp"
import { VehicleGroup } from "../../public/interface/VehicleGroup"
import { VehicleKind } from "../../public/interface/VehicleKind"
import { VehicleSystem } from "../../public/interface/VehicleSystem"
import { VehicleUsedType } from "../../public/interface/VehicleUsedType"

export interface ThirdParyInquiry {
    "id": number,
    "fan_inquiry_id": number,
    "user_id": number,
    "status": number,
    "is_ownership_changed": number,
    "discount_history": string,
    "has_damage": Ans,
    "other_discount_plaque_double_digit": number|null,
    "other_discount_plaque_triple_digit": number|null,
    "other_discount_plaque_iran_digit": string|null,
    "other_discount_plaque_letter_id": number|null,
    "other_discount_plaque_letter_caption": number|null,
    "is_new_car": number,
    "has_spare": number,
    "spare_count": number|null,
    "spare_plaque_date": string|null,
    "is_in_free_region": Ans,
    "free_region_id": number|null,
    "life_cov": number,
    "life_dmg_count": number,
    "life_final_extra_prm": number,
    "driver_accidents_cov": number,
    "driver_accidents_dmg_count": number,
    "driver_accidents_dmg_final_extra_prm": number,
    "driver_accidents_wait_duration": number,
    "final_fund_prm": number,
    "financial_cov": number,
    "financial_dmg_count": number,
    "financial_final_extra_prm": number,
    "plaque_date": string|null,
    "plaque_kind_id": number,
    "plaque_sample_id": number|null,
    "policy_driver_accidents_duration": number,
    "policy_driver_accidents_percent": number,
    "policy_third_party_duration": number,
    "policy_third_party_percent": number,
    "previous_insurance_corp_id": number,
    "previous_policy_begin_date": string,
    "previous_policy_discount_duration": number,
    "previous_policy_discount_percent": number,
    "previous_policy_driver_accidents_discount_duration": number,
    "previous_policy_driver_accidents_discount_percent": number,
    "previous_policy_end_date": string,
    "begin_date": string,
    "end_date": string,
    "built_year": number,
    "calc_kind_id": number,
    "vehicle_kind_id": number,
    "vehicle_group_id": number,
    "vehicle_system_id": number,
    "used_id": number,
    "tax": number,
    "total_premium": number,
    "toll": number,
    "third_party_waite_duration": number|null,
    "third_party_final_prm": number,
    "created_at": number,
    "updated_at": number,
    "delete_mode"?: number|null,
    "vehicleGroup"?: VehicleGroup,
    "used"?: VehicleUsedType,
    "vehicleKind"?: VehicleKind,
    "vehicleSystem"?: VehicleSystem,
    "previousInsuranceCorp"?: InsuranceCorp,
    "plaqueKind"?: VehicleKind ,
    "calcKind"?: CalcKind,
}