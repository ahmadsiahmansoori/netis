<?php

namespace app\modules\vehicle\models\searchModels;

use app\modules\vehicle\models\changeData\VehicleGroupCD;
use app\modules\vehicle\models\VehicleGroup;
use yii\data\ActiveDataProvider;

class VehicleGroupSearchModel extends VehicleGroup
{


    public function rules()
    {
        return [
            [['id', 'name', 'value' ,'active' , 'name_fa' , 'name_en'] , 'safe']
        ];
    }

    public $name;
    public $value;

    public function search(): ActiveDataProvider
    {



        $query = VehicleGroupCD::find();

        $data = new ActiveDataProvider([
            'query' => $query
        ]);


        $query->andFilterWhere([
           'id' => $this->id,
            'active' => $this->active,
            'id' => $this->value,
        ]);

        $query->andFilterWhere(['like' , 'name_fa' , $this->name_fa])
            ->andFilterWhere(['like' , 'name_fa' , $this->name])
        ->andFilterWhere(['like' , 'name_en' , $this->name_en]);


        return $data;

    }

}