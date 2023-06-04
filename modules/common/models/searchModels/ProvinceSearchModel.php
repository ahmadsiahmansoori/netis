<?php

namespace app\modules\common\models\searchModels;

use app\modules\common\models\Provinces;
use yii\data\ActiveDataProvider;

class ProvinceSearchModel extends Provinces
{

    public function rules(): array
    {
        return [
            [['id' , 'name_fa', 'active'  , 'name_en'] , 'safe']
        ];
    }



    public function search(): ActiveDataProvider
    {
        $query = self::find();




        $data = new ActiveDataProvider([
            'query' => $query
        ]);



        $query->andFilterWhere([
            'id' => $this->id,
            'active' => $this->active
        ]);

        $query->andFilterWhere(['like', 'name_fa' , $this->name_fa]);
        $query->andFilterWhere(['like', 'name_en' , $this->name_en]);
        $query->andWhere(['active' => 1]);


        return $data;
    }

}