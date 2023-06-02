import { Observable, of } from 'rxjs';
import { RequestInsertOrder, ResponeInsertOrder } from "../interface/InsertOrder";
import { OrderInfo } from "../interface/IorderInfo";


export abstract class order {
    /*
        --- insert new row order - insurnce ---
        http request Method POST
        set header Authentication Bear {Token}
        @form mac data requst
        @res  mac data response
    */
    public order(): Observable<ResponeInsertOrder> {
        
        const form: RequestInsertOrder = {
            insurance_company_id: 1,
            inquiry_id: 3,
            insurance_line_id: 4,
            insurance_line_category_id: 4
        }


        let res: OrderInfo = {
            id: 0,
            user_id: 0,
            order_id: 0,
            insurance_line_id: 0,
            insurance_line_category_id: 0,
            inquiry_id: 0,
            detail_id: 0,
            status: 0,
            created_at: 0,
            updated_at: 0
        }
        
        return of(res);
    }
}