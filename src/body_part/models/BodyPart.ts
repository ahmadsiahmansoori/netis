import { Observable, from, of } from "rxjs";
import { Inquiry } from "../../public/interface/Inquiry";
import { BodyRequestInquiry, BodyResponseInquiry } from "../interface/Inquiry";

export abstract class BodyPart {
    
    /*
        --- Inquiry bod part insurance ---
        http request Method POST
        @form mac data requst
        @res  mac data response
    */
    public calc(): Observable<BodyResponseInquiry> {

        const form: BodyRequestInquiry = 
        {
            "vehicle_group" : {"name":"سواري" , "value":1},
            "used" : {"name":"شخصي" , "value":1},
            "vehicle_system" : {"name":"پژو" , "value":2},
            "vehicle_kind" : {"name":"پژو پرشيا" , "value":661},
            "vehicle_fuel_type" : {"name":"بنزيني" , "value":5222},
            "built_year" : "1401 - 2020",
            "is_in_free_region" : 0,
            "province" : null,
            "free_region" : null,
            "has_body_party_insurance_history": 1,
            "previous_insurance_corp" : {"name":"ميهن" , "value":710},
            "previous_discount" : {"name" : "تخفيف عدم خسارت سال اول" , "value": 3},
            "previous_policy_begin_date": "1401/03/11",
            "previous_policy_end_date": "1402/03/11",
            "is_new_car":0,
            "plaque_date": null,
            "insurance_discount_third_party": 60,
            "insurance_third_party_corp": {"name":"ميهن" , "value":710},
            "vehicle_value": 100000000,
            "has_non_fabric": 0,
            "vehicle_non_fabric_value": 0,
            "list_non_fabric_detail": [],
            "additional_covs": [
                {
                    "name": "نوسان قيمت",
                    "value": 7,
                    "dmg_effective_percent" : 25
                }
            ],
            "discounts": []
        };


        let inquiry: Inquiry[] = [{
            "id": 3,
            "fan_id": 140837,
            "name": "بیمه میهن",
            "insurance_company_id": 1,
            "insurance_line_id": 4,
            "insurance_line_category_id": 4,
            "icon": "/logo/mail.png",
            "discountPercentage": 0,
            "discount": 0,
            "mainPrice": 0,
            "finalPrice": 658088,
            "rate": 4,
            "options": []
        }]


        let res: BodyResponseInquiry = {
            bodyPartyInsuranceList: inquiry ,
            inquiryDetails: form,
            totalCount: 0
        }
        return of(res)
    }

}