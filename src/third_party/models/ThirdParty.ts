import { Observable, of } from "rxjs";
import { RequestThirdPartyInquiry, ResponseThirdPartyInquiry } from "../interface/Inquiry";
import { Inquiry } from "../../public/interface/Inquiry";
import { ThirdParyInquiry } from "../interface/ThirdPartyInquiry";

export abstract class ThirdParty {
  


    /*
        --- Inquiry Third part insurance ---
        http request Method POST
        @form mac data requst
        @res  mac data response
    */
    public calc(): Observable<ResponseThirdPartyInquiry> {


        const form: RequestThirdPartyInquiry = {
            "validityDuration": null,
            "vehicleType": {
                "value": 1,
                "name": "سواري"
            },
            "vehicleUx": {
                "value": 1,
                "name": "شخصي"
            },
            "vehicleBrand": {
                "value": 1,
                "name": "پرايد"
            },
            "vehicleModel": {
                "value": 218,
                "name": "پرايد دي ام"
            },
            "vehicleYear": "1402 - 2023",
            "insuranceCompany": {
                "name": "ايران",
                "value": 321
            },
            "dateStart": "1402/03/01",
            "dateEnd": "1402/03/04",
            "dateDischarge": null,
            "isOwnershipChanged": true,
            "discountHistory": "no",
            "plaqueDoubleDigit": null,
            "plaqueAlphabet": null,
            "plaqueTripleDigit": null,
            "plaqueIranDigit": null,
            "percentThirdParty": null,
            "percentDriver": null,
            "hasDamage": false,
            "damageFinancial": null,
            "damageHealth": null,
            "damageDriver": null,
            "covFinancial": null,
            "covLife": null,
            "covDriver": null
        }

        let inquiry: Inquiry[] = [{
            "id": 3,
            "fan_id": 140837,
            "name": "بیمه میهن",
            "insurance_company_id": 1,
            "insurance_line_id": 5,
            "insurance_line_category_id": 4,
            "icon": "/logo/mail.png",
            "discountPercentage": 0,
            "discount": 0,
            "mainPrice": 0,
            "finalPrice": 658088,
            "rate": 4,
            "options": []
        }]


        let res: ResponseThirdPartyInquiry = {
            thirdPartyInsuranceList: inquiry,
            inquiryDetails: form,
            totalCount: 1
        }

        return of(res)
    }

    /*
        --- index  Third part insurance ---
        http request Method GET
        @res  mac data response
    */
    public index(): Observable<ThirdParyInquiry[]> {

        let res: ThirdParyInquiry[] = [
            {
                "id": 1,
                "fan_inquiry_id": 714359,
                "user_id": 1,
                "status": 2,
                "is_ownership_changed": 1,
                "discount_history": "no",
                "has_damage": 0,
                "other_discount_plaque_double_digit": null,
                "other_discount_plaque_triple_digit": null,
                "other_discount_plaque_iran_digit": null,
                "other_discount_plaque_letter_id": null,
                "other_discount_plaque_letter_caption": null,
                "is_new_car": 0,
                "has_spare": 232,
                "spare_count": null,
                "spare_plaque_date": null,
                "is_in_free_region": 0,
                "free_region_id": null,
                "life_cov": 8000,
                "life_dmg_count": 0,
                "life_final_extra_prm": 0,
                "driver_accidents_cov": 270,
                "driver_accidents_dmg_count": 0,
                "driver_accidents_dmg_final_extra_prm": 189000,
                "driver_accidents_wait_duration": 0,
                "final_fund_prm": 532384,
                "financial_cov": 1600,
                "financial_dmg_count": 0,
                "financial_final_extra_prm": 3512200,
                "plaque_date": null,
                "plaque_kind_id": 1,
                "plaque_sample_id": null,
                "policy_driver_accidents_duration": 0,
                "policy_driver_accidents_percent": 0,
                "policy_third_party_duration": 0,
                "policy_third_party_percent": 0,
                "previous_insurance_corp_id": 321,
                "previous_policy_begin_date": "1402/03/01",
                "previous_policy_discount_duration": 0,
                "previous_policy_discount_percent": 0,
                "previous_policy_driver_accidents_discount_duration": 0,
                "previous_policy_driver_accidents_discount_percent": 0,
                "previous_policy_end_date": "1402/03/04",
                "begin_date": "1402/03/11",
                "end_date": "1403/03/11",
                "built_year": 1402,
                "calc_kind_id": 221,
                "vehicle_kind_id": 218,
                "vehicle_group_id": 1,
                "vehicle_system_id": 1,
                "used_id": 1,
                "tax": 1573060,
                "total_premium": 34825100,
                "toll": 1258450,
                "third_party_waite_duration": null,
                "third_party_final_prm": 27760000,
                "created_at": 1685629720,
                "updated_at": 1685629815,
                "delete_mode": null,
                "vehicleGroup": {
                    "value": 1,
                    "name": "سواري"
                },
                "used": {
                    
                    "value": 1,
                    "name": "شخصي"
                },
                "vehicleKind": {
                    
                    "value": 218,
                    "name": "پرايد دي ام"
                },
                "vehicleSystem": {
                   
                    "value": 1,
                    "name": "پرايد"
                },
                "previousInsuranceCorp": {
                    "name": "ايران",
                    "value": 321
                },
                "plaqueKind": {
                    "name": "عمومي",
                    "value": 1
                },
                "calcKind": {
                    "name": "يکساله",
                    "value": 221
                }
            }
        ];
        return of(res)
    }


    /*
        --- show  Third part insurance ---
        http request Method GET
        set  query params for url  {id}
        @res  mac data response
    */
    public show(id: number): Observable<ThirdParyInquiry> {

        let res: ThirdParyInquiry = {
                "id": 1,
                "fan_inquiry_id": 714359,
                "user_id": 1,
                "status": 2,
                "is_ownership_changed": 1,
                "discount_history": "no",
                "has_damage": 0,
                "other_discount_plaque_double_digit": null,
                "other_discount_plaque_triple_digit": null,
                "other_discount_plaque_iran_digit": null,
                "other_discount_plaque_letter_id": null,
                "other_discount_plaque_letter_caption": null,
                "is_new_car": 0,
                "has_spare": 232,
                "spare_count": null,
                "spare_plaque_date": null,
                "is_in_free_region": 0,
                "free_region_id": null,
                "life_cov": 8000,
                "life_dmg_count": 0,
                "life_final_extra_prm": 0,
                "driver_accidents_cov": 270,
                "driver_accidents_dmg_count": 0,
                "driver_accidents_dmg_final_extra_prm": 189000,
                "driver_accidents_wait_duration": 0,
                "final_fund_prm": 532384,
                "financial_cov": 1600,
                "financial_dmg_count": 0,
                "financial_final_extra_prm": 3512200,
                "plaque_date": null,
                "plaque_kind_id": 1,
                "plaque_sample_id": null,
                "policy_driver_accidents_duration": 0,
                "policy_driver_accidents_percent": 0,
                "policy_third_party_duration": 0,
                "policy_third_party_percent": 0,
                "previous_insurance_corp_id": 321,
                "previous_policy_begin_date": "1402/03/01",
                "previous_policy_discount_duration": 0,
                "previous_policy_discount_percent": 0,
                "previous_policy_driver_accidents_discount_duration": 0,
                "previous_policy_driver_accidents_discount_percent": 0,
                "previous_policy_end_date": "1402/03/04",
                "begin_date": "1402/03/11",
                "end_date": "1403/03/11",
                "built_year": 1402,
                "calc_kind_id": 221,
                "vehicle_kind_id": 218,
                "vehicle_group_id": 1,
                "vehicle_system_id": 1,
                "used_id": 1,
                "tax": 1573060,
                "total_premium": 34825100,
                "toll": 1258450,
                "third_party_waite_duration": null,
                "third_party_final_prm": 27760000,
                "created_at": 1685629720,
                "updated_at": 1685629815,
                "delete_mode": null,
                "vehicleGroup": {
                    "value": 1,
                    "name": "سواري"
                },
                "used": {
                    
                    "value": 1,
                    "name": "شخصي"
                },
                "vehicleKind": {
                    
                    "value": 218,
                    "name": "پرايد دي ام"
                },
                "vehicleSystem": {
                   
                    "value": 1,
                    "name": "پرايد"
                },
                "previousInsuranceCorp": {
                    "name": "ايران",
                    "value": 321
                },
                "plaqueKind": {
                    "name": "عمومي",
                    "value": 1
                },
                "calcKind": {
                    "name": "يکساله",
                    "value": 221
                }
            };
        return of(res)    
    }


}