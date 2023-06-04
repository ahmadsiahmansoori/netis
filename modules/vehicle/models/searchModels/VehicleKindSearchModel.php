<?php

namespace app\modules\vehicle\models\searchModels;

use app\modules\vehicle\models\changeData\VehicleKindCD;
use app\modules\vehicle\models\VehicleKind;
use app\modules\vehicle\models\VehicleSystem;
use yii\data\ActiveDataProvider;

class VehicleKindSearchModel extends VehicleKind
{


    public function rules()
    {
        return [
            [['id','vehicle_group_id', 'vehicle_system_id' ,'active' , 'name_fa' , 'name_en'] , 'safe']
        ];
    }


    public function search() {



        $query = VehicleKindCD::find();

        $data = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);


        $query->andFilterWhere([
            'id' => $this->id,
            'active' => $this->active,
            'vehicle_group_id' => $this->vehicle_group_id,
            'cylinder_count' => $this->cylinder_count,
            'passenger_count' => $this->passenger_count,
            'tonnage' => $this->tonnage,


        ]);


        $query->andFilterWhere([
            'OR' ,
            ['vehicle_system_id' => $this->vehicle_system_id],
            ['vehicle_system_second_id' => $this->vehicle_system_id],
            ['vehicle_system_three_id' => $this->vehicle_system_id],
           
        ]);

        $query->andFilterWhere(['like' , 'name_fa' , $this->name_fa])
            ->andFilterWhere(['like' , 'name_en' , $this->name_en])
            ->andFilterWhere(['like' , 'vehicle_system_caption' , $this->vehicle_system_caption])
            ->andFilterWhere(['like' , 'vehicle_category_caption' , $this->vehicle_category_caption]);

        return $data;

    }

}