import { OrderInfo } from "./IorderInfo";


export interface RequestInsertOrder{
    "insurance_company_id": number,
    "inquiry_id": number ,
    "insurance_line_id": number ,
    "insurance_line_category_id": number
}


export interface ResponeInsertOrder {
    id: number,
    user_id: number,
    order_id: number,
    insurance_line_id: number,
    insurance_line_category_id: number,
    inquiry_id: number,
    detail_id: number|null,
    status: number,
    created_at: number,
    updated_at: number,
}
