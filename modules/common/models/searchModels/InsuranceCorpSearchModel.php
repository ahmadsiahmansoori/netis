<?php

namespace app\modules\common\models\searchModels;

use app\modules\common\models\InsuranceCorp;
use yii\data\ActiveDataProvider;

class InsuranceCorpSearchModel extends InsuranceCorp
{


    public function rules()
    {
        return [
            [['id' , 'active' , 'name'] , 'safe']
        ];
    }

    public function search(): ActiveDataProvider
    {

        $query = self::find();

        $data = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);



        $query->andFilterWhere([
           'id' => $this->id,
           'active' => $this->active
        ]);

        $query->andFilterWhere(['like', 'name' , $this->name]);


        return $data;
    }

}