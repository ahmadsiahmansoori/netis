<?php

namespace app\modules\common\models\searchModels;

use app\modules\common\models\Cites;
use yii\data\ActiveDataProvider;

class CitySearchModel extends Cites
{

    public function rules()
    {
        return [
            [['id' , 'active' , 'province_id' , 'is_in_free_region' , 'name_fa' , 'name_en'] , 'safe']
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
            'active' => $this->active,
            'province_id' => $this->province_id,
            'is_in_free_region' => $this->is_in_free_region,
        ]);

        $query->andFilterWhere(['like', 'name_fa' , $this->name_fa]);
        $query->andFilterWhere(['like', 'name_en' , $this->name_en]);
        $query->andWhere(['active' => 1]);


        return $data;
    }

}