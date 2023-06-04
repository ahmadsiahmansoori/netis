<?php

namespace app\modules\thirdParty\models;

use yii\base\Exception;
use yii\base\Model;

class UploadAttachFIleThirdPartDetail extends Model
{



    public $imageFile;



    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg' , 'maxSize' => (1024 * 400)],
        ];
    }


    /**
     * @throws Exception
     */
    public function  upload() {
        if ($this->validate()) {

            $type = strtolower(pathinfo(basename($_FILES['image_path']['name']) , PATHINFO_EXTENSION));
            $name = \Yii::$app->security->generateRandomString(13) . '.' . $type;


            if (!file_exists('../files/'))
            {
                mkdir('../files/');
            }



        }
        return false;
    }

}