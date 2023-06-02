import { Observable, of } from 'rxjs';
import { RQInsertOrder } from "../interface/InsertOrder";
import { OrderInfo } from "../interface/orderInfo";


export abstract class order {
    /*
        --- insert new row order - insurnce ---
        http request Method POST
        set header Authentication Bear {Token}
        @form DATA.mac data requst
        @res  DATA.mac  response
        return Model {OrderInfo}
    */
    public order(form: RQInsertOrder): Observable<OrderInfo> {
        return of();
    }
}