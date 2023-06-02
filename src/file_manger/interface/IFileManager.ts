
export interface IFileManager {
    id: number,
    user_id: number,
    path?: string,
    link: string|null,
    insurance_line: number|null,
    tag: string|null,
    name: string|null,
    description: string|null,
    status: number|null,
    extension: string|null,
    created_at: number,
    updated_at: number
}
