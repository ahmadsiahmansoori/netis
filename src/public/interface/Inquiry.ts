export interface Inquiry {
    id: number,
    fan_id: number,
    name: string,
    insurance_company_id: number,
    insurance_line_id: number,
    insurance_line_category_id: number,
    icon: string,
    discountPercentage: number,
    discount: number,
    mainPrice: number,
    finalPrice: number,
    rate: number,
    options: any
}