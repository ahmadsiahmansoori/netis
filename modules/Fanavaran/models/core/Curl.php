<?php

namespace app\modules\Fanavaran\models\core;

class Curl
{

    public const GET = 'GET';
    public const POST = 'POST';

    public static function httpRequest($url , $headers = [], $type = self::GET, $postFields = null , $response_json = true): array
    {
        try {

            $curl = curl_init();
            $curlOptions = [
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_SSL_VERIFYHOST => false,
                CURLOPT_SSL_VERIFYPEER => false,
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_AUTOREFERER     => true,   // set referrer on redirect
                CURLOPT_TIMEOUT => 99999,
                CURLOPT_HEADER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => $type,
                CURLOPT_HTTPHEADER => $headers,
            ];


            if ($type == self::POST)
            {
                $curlOptions[CURLOPT_POST] = 1 ;
                $curlOptions[CURLOPT_POSTFIELDS] = $postFields;
            }

            curl_setopt_array($curl, $curlOptions);
            $message = '';

            $response = curl_exec($curl);
            $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

            curl_close($curl);

            if(curl_errno($curl)) {
                $message = curl_error($curl);
            }





            list($headers, $content) = explode("\r\n\r\n", $response, 2);

            if ($response_json)
            {
                $content =  json_decode($content , true);
            }

            $headers = explode("\n", $headers);

            $headers_maps = [];

            foreach ($headers as  $value)
            {
                $data = explode(':' ,  $value , 2 );
                $headers_maps[trim($data[0])] = isset($data[1]) ?  trim($data[1]) : '' ;
            }

            return [
                'status_code' => $responseCode,
                'headers' => $headers_maps ,
                'content' => $content,
                'message' => $message
            ];

        }catch (\Exception $err)
        {

            return [
                'status_code' => 500,
                'headers' => null ,
                'content' => null,
                'errors' => $err,
                'message' => $err->getMessage()
            ];
        }


    }



    public static function logCurlInsert( $url , $status , $curl , $response) {




    }

}