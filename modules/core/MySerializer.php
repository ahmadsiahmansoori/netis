<?php

namespace app\modules\core;

use yii\rest\Serializer;

class MySerializer extends Serializer
{
    public function serialize($data)
    {
        $d = parent::serialize($data);
        unset($d['_links']);
        return $d;
    }
}