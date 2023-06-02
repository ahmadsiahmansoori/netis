import { AdditionalCov } from "../../public/interface/AdditionalCov";
import { Ans } from "../../public/interface/Ans";
import { City } from "../../public/interface/City";
import { Inquiry } from "../../public/interface/Inquiry";
import { InsuranceCorp } from "../../public/interface/InsuranceCorp";
import { LossesHistory } from "../../public/interface/LossesHistory";
import { Province } from "../../public/interface/Province";
import { VehicleFuleType } from "../../public/interface/VehicleFuelType";
import { VehicleGroup } from "../../public/interface/VehicleGroup";
import { VehicleKind } from "../../public/interface/VehicleKind";
import { VehicleSystem } from "../../public/interface/VehicleSystem";
import { VehicleUsedType } from "../../public/interface/VehicleUsedType";
import { NoFabricDetail } from "../../public/interface/no_fabric_detail";



export interface RQBodyPartInquiry {
    "vehicle_group": VehicleGroup,
    "used": VehicleUsedType,
    "vehicle_system": VehicleSystem,
    "vehicle_kind": VehicleKind,
    "vehicle_fuel_type": VehicleFuleType,
    "built_year": string, // format => 1401 - 2020
    "is_in_free_region": Ans, 
    "province": Province|null,
    "free_region": City|null,
    "has_body_party_insurance_history": Ans,
    "previous_insurance_corp": InsuranceCorp,
    "previous_discount": LossesHistory,
    "previous_policy_begin_date": string,
    "previous_policy_end_date": string,
    "is_new_car": Ans,
    "plaque_date": string|null,
    "insurance_discount_third_party": number,
    "insurance_third_party_corp": InsuranceCorp,
    "vehicle_value": number,
    "has_non_fabric": Ans,
    "vehicle_non_fabric_value": number|null,
    "list_non_fabric_detail": NoFabricDetail[]|[]
    "additional_covs": AdditionalCov[]|[],
    "discounts": any[],
}


export interface RSBodyPartInquiry {
    "bodyPartyInsuranceList": Inquiry[],
    "inquiryDetails": RQBodyPartInquiry,
    "totalCount": number,
}