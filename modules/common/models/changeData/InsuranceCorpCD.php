<?php

namespace app\modules\common\models\changeData;

use app\modules\common\models\InsuranceCorp;

class InsuranceCorpCD extends  InsuranceCorp
{

    public function fields()
    {
        $parent = parent::fields(); // TODO: Change the autogenerated stub
//        $parent = [];
        $parent['name'] = function () {
            return $this->name;
        };
        $parent['value'] = function () {
            return $this->id;
        };

        return $parent;
    }


    public static function find()
    {
        return parent::find()->where(['active' => 1]); // TODO: Change the autogenerated stub
    }


}