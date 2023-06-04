<?php

namespace app\modules\vehicle\models\searchModels;

use app\modules\vehicle\models\changeData\VehicleSystemCD;
use app\modules\vehicle\models\VehicleGroup;
use app\modules\vehicle\models\VehicleSystem;
use yii\data\ActiveDataProvider;

class VehicleSystemSearchModel extends VehicleSystem
{


    public function rules()
    {
        return [
            [['id','vehicle_group_id', 'active' , 'name_fa' , 'name_en'] , 'safe']
        ];
    }


    public function search() {



        $query = VehicleSystemCD::find();

        $data = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);


        $query->andFilterWhere([
            'id' => $this->id,
            'active' => $this->active,
            'vehicle_group_id' => $this->vehicle_group_id
        ]);

        $query->andFilterWhere(['like' , 'name_fa' , $this->name_fa])
            ->andFilterWhere(['like' , 'name_en' , $this->name_en]);


        return $data;

    }

}