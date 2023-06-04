<?php
namespace app\modules\Fanavaran\models\core;

use yii\web\BadRequestHttpException;

class Auth
{



    private $_errors = null;

    private $_app_token = null;
    private static $_model = null;

    public function __construct()
    {
        $this->checkValidToken();
    }


    public static function init(): ?Auth
    {
        if(empty(self::$_model))
        {
            self::$_model = new Auth();
        }

        return self::$_model;
    }


    public function checkValidToken() {
        $model = AuthUser::find()->one();


        if(empty($model)) {
            if($this->getAppToken()->login()) {
                return true;
            }
            return  false;
        }

        $date = $model->updated_at + (12 * 60 * 60) ;

        if ($date < time()) {

            if($this->getAppToken()->login()) {
                return true;
            }
        }

        if($this->_errors != null)
        {
            return  false;
        }
        return  true;
    }

    public function refreshToken() {
        if($this->getAppToken()->login()) {
            return true;
        }
        return  false;
    }


    public function deleteToken() {
        AuthUser::deleteAll();
    }


    public function setToken(string $token , $user = null) {
        $model = new AuthUser();
        if ($user != null)
        {
            $model->username = $user['UserName'];
            $model->user_id = $user['UserId'];
            $model->farsi_name = $user['FarsiName'];
        }

        $model->auth_kay = $token;

        $this->deleteToken();

        if( !$model->save()) {
            throw new BadRequestHttpException('insert auth user fail checking Auth Model Errors: ' . json_encode($model->errors));
        }
    }

    public function getAppToken() {

        try {
            $data = [
                'Content-Length: 0',
                'appname: ' . Conf::APP_NAME,
                'secret: ' . Conf::SECRET
            ];



            $response =  Curl::httpRequest(Conf::GET_APP_TOKEN , $data , Curl::POST);


            $this->_app_token = $response['headers']['appToken'];

        } catch (\Exception $err)
        {
            $this->_errors = ['status' => false , 'code' => 500 , 'message' => 'internal server errors' , 'errors' => [
                'file' => $err->getFile(),
                'line' => $err->getLine(),
                'code' => $err->getCode(),
                'message' => $err->getMessage(),
            ]];
        }


        return $this;
    }

    public function login() {
        try {
           if (empty($this->_errors) && !empty($this->_app_token))
           {
               $data = [
                   'Content-Type: application/json',
                   'Content-Length: 0',
                   'username: ' . Conf::USER_NAME,
                   "appToken: " . $this->_app_token,
                   "password: " . Conf::PASSWORD
               ];



               $response =  Curl::httpRequest(Conf::LOGIN , $data , Curl::POST);


               $auth = $response['headers']['authenticationToken'];
               $user = $response['content'];

               $this->setToken($auth , $user);

               return  true;
           }
           return  false;
        } catch (\Exception $err)
        {
            $this->_errors = ['status' => false , 'code' => 500 , 'message' => 'internal server errors' , 'errors' => [
                'file' => $err->getFile(),
                'line' => $err->getLine(),
                'code' => $err->getCode(),
                'message' => $err->getMessage(),
            ]];

            return false;
        }


    }



    public function getErrors() {
        return $this->_errors;
    }

    public function getToken() {
        $token = AuthUser::find()->asArray()->orderBy(['created_at' => SORT_DESC])->one();
        if(empty($token)) {
            return '';
        }
        return  $token['auth_kay'];
    }



}