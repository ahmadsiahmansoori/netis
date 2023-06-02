import { CalcKind } from "../../public/interface/CalcKind";
import { Dmg } from "../../public/interface/Dmg";
import { Inquiry } from "../../public/interface/Inquiry";
import { InsuranceCorp } from "../../public/interface/InsuranceCorp";
import { PlaqueLetter } from "../../public/interface/PlaqueLetter";
import { VehicleGroup } from "../../public/interface/VehicleGroup";
import { VehicleKind } from "../../public/interface/VehicleKind";
import { VehicleSystem } from "../../public/interface/VehicleSystem";
import { VehicleUsedType } from "../../public/interface/VehicleUsedType";

export interface RequestThirdPartyInquiry {
    "validityDuration":  CalcKind|null,
    "vehicleType": VehicleGroup,
    "vehicleUx": VehicleUsedType,
    "vehicleBrand": VehicleSystem,
    "vehicleModel": VehicleKind,
    "vehicleYear": string,
    "insuranceCompany": InsuranceCorp,
    "dateStart": string,
    "dateEnd": string,
    "dateDischarge": string|null,
    "isOwnershipChanged": boolean,
    "discountHistory": string , // TODO: create interface
    "plaqueDoubleDigit":number|null,
    "plaqueAlphabet":PlaqueLetter|null,
    "plaqueTripleDigit":number|null,
    "plaqueIranDigit":number|null,
    "percentThirdParty":number|null,
    "percentDriver":number|null,
    "hasDamage": boolean,
    "damageFinancial": Dmg|null,
    "damageHealth": Dmg|null,
    "damageDriver": Dmg|null,
    "covFinancial": number|null,
    "covLife": number|null,
    "covDriver": number|null,
}


export interface ResponseThirdPartyInquiry {
    "thirdPartyInsuranceList": Inquiry[],
    "inquiryDetails": RequestThirdPartyInquiry,
    "totalCount": number,
}


