import { Observable, from, of } from "rxjs";
import { Inquiry } from "../../public/interface/Inquiry";
import { RQBodyPartInquiry, RSBodyPartInquiry } from "../interface/Inquiry";

export abstract class BodyPart {
    

    // path address API Third Party
    public readonly URL: string = '/body'


    /*
        --- Inquiry bod part insurance ---
        http request Method POST
        url: "{URL}/inquiry"
        @form DATA.mac data requst
        @res  DATA.mac  response
        return Model {RSBodyPartInquiry}
    */
    public inquiry(form: RQBodyPartInquiry): Observable<RSBodyPartInquiry> {
        return of()
    }

}