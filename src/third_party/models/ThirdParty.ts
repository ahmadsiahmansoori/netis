import { Observable, of } from "rxjs";
import { RequestThirdPartyInquiry, ResponseThirdPartyInquiry } from "../interface/Inquiry";
import { Inquiry } from "../../public/interface/Inquiry";
import { ThirdParyInquiry } from "../interface/ThirdPartyInquiry";

export abstract class ThirdParty {
  

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


    public index(): Observable<ThirdParyInquiry[]> {


        return of()
    }

    public show(id: number): Observable<ThirdParyInquiry> {
        
        return of()
    }


}