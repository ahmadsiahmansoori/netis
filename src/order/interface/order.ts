
export interface Order {
    id_order: number,
    user_id: number,
    insurance_company_id: number,
    insurance_line_id: number,
    insurance_line_category_id: number,
    insurance_code: number,
    detail_id: number,
    status: number,
    path_doc_insurance: string|null,
    final_price: number,
    price: number,
    tax: number,
    toll: number,
    created_at: number,
    updated_at: number,
}