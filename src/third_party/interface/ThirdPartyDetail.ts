import { City } from "../../public/interface/City";
import { Gender } from "../../public/interface/Gender";
import { Owner } from "../../public/interface/Owner";
import { PersonTransfer } from "../../public/interface/PersonTransfer";
import { PlaqueLetter } from "../../public/interface/PlaqueLetter";
import { Province } from "../../public/interface/Province";
import { ThirdPartyDetailDrivers } from "./ThirdPartyDetailDrivers";

export interface ThirdPartyDetail {

    path_file_img_front_cart_vehicle: string,
    path_file_img_back_cart_vehicle: string,
    plaque_double_digit: number,
    plaque_triple_digit: number,
    plaque_iran_digit: number,
    plaque_letter: PlaqueLetter,
    vehicle_motor_no: string,
    vehicle_chassis_no: string,
    vehicle_vin: string,

    owner_vehicle_melli_code: string,
    owner_vehicle_hbd_date: string,
    owner_vehicle_gender: Gender,

    other_owner_vehicle_full_name: string,
    other_owner_vehicle_user_hbd_date: string,
    other_owner_vehicle_user_code: string,


    owner_status_vehicle: Owner,
    mention_insurance_status_owner: Owner,
    relativity_to_person_transfer: PersonTransfer,
    mention_insurance_province: Province,
    mention_insurance_city: City,
    mention_insurance_call_number: string,
    mention_insurance_address: string,
    mention_insurance_code_post: string,
    other_mention_insurance_user_hbd_date: String|null,
    other_mention_insurance_user_melli_code: string|null,
    other_mention_insurance_user_gender: Gender|null
    email: string,
    description: string,
    drivers: ThirdPartyDetailDrivers[],

}