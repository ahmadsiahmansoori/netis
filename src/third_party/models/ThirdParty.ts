import { Observable, of } from "rxjs";
import { RQThirdPartyInquiry, RSThirdPartyInquiry } from "../interface/Inquiry";
import { ThirdParyInquiry } from "../interface/ThirdPartyInquiry";
import { OrderInfo } from "../../order/interface/orderInfo";
import { RQThirdParty } from "../interface/RQThirdParty";

export abstract class ThirdParty {
  

    // path address API Third Party
    public readonly URL: string = '/third-party'

    /*
        --- Inquiry Third part insurance ---
        http request Method POST
        url: "{URL}/inquiry"
        @form DATA.mac data requst
        @res  DATA.mac  response
        return Model {RSThirdPartyInquiry}
    */
    public inquiry(form: RQThirdPartyInquiry): Observable<RSThirdPartyInquiry> {
        return of()
    }

    /*
        --- index  Third part insurance ---
        http request Method GET
        url: "{URL}/inquiry"
        return Model {ThirdParyInquiry[]}
    */
    public indexInquiry(): Observable<ThirdParyInquiry[]> {
        return of()
    }


    /*
        ---  Third part Inquiry insurance ---
        http request Method GET
        set  query params for url  {id}
        url: "{URL}/inquiry/{id}"
        return Model {ThirdParyInquiry}
    */
    public showInquiry(id: number): Observable<ThirdParyInquiry> {
        return of()    
    }

    /*
        --- Detail Third part set Order  ---
        http request Method POST
        set header Authentication Bear {Token}
        @form DATA.mac data requst {RQThirdParty}
        @res  DATA.mac  response
        return Model {OrderInfo}

    */
   //TODO: fixed interface RQthirdParty
    public detail(form: RQThirdParty): Observable<OrderInfo> {
        return of()
    }

    /*
        --- Detail Third part   ---
        http request Method POST
        set header Authentication Bear {Token}
        set  query params for url  {id}
        url: "{URL}/{id}"
        return Model {any}
    */
   // TODO: create interface thirdParty 
    public showDetail(id: number): Observable<any> {
        return of()
    }



}