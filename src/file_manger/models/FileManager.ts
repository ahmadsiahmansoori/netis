import { Observable, of } from "rxjs"
import { IFileManager } from "../interface/IFileManager";

export abstract class FileManager {

    // TODO: bug system file manager , don't use 



    public readonly URL = ''


    /*
        --- File Manager   ---
        http request Method GET
        set header Authentication Bear {Token}
        set  query params for url  {id}
        url: "{URL}/{id}"
        return Model {IFileManager[]}
    */
    public index(): Observable<IFileManager[]> {
        return of();
    }

    /*
        --- File Manager   ---
        http request Method GET
        set header Authentication Bear {Token}
        set  query params for url  {id}
        url: "{URL}/{id}"
        return Model {IFileManager}
    */
    public show(): Observable<IFileManager> {
        return of();
    }



    /*
        --- upload image file  ---
        http request Method POST
        SET: header Authentication Bear {Token}
        SET: Content-Type: FormData
        SET: event select file (png , jpg)
        OPTION: tag , name , description ,  insurance_line
        return Model {IFileManager}
    */
    public upload(event: any):Observable<IFileManager> {
        const file = event?.target?.files[0]
        const form = new FormData()
        form.append('file' , file)
        return of();
    }


    /*
        --- read File    ---
        http request Method GET
        create path address for read file 
        return Model {string}
    */
    public readFile(link: string , token: string): string {
        return this.URL + '/read-file' + '?link=' + link + '&' + 'token=' + token ;
    }


}