<?php

namespace app\modules\vehicle\models\searchModels;

use app\modules\vehicle\models\changeData\VehicleUseTypeCD;
use app\modules\vehicle\models\VehicleGroup;
use app\modules\vehicle\models\VehicleUseType;
use yii\data\ActiveDataProvider;

class VehicleUseTypeSearchModel extends VehicleUseType
{
    public $name;
    public $value;
    public $group_id;
    public function rules()
    {
        return [
            [['id' , 'name' , 'group_id' , 'value' , 'vehicle_group_id' , 'active' , 'name_fa' , 'name_en'] , 'safe']
        ];
    }


    public function search() {



        $query = VehicleUseTypeCD::find();

        $data = new ActiveDataProvider([
            'query' => $query
        ]);


        $query->andFilterWhere([
            'id' => $this->id,
            'active' => $this->active,
            'vehicle_group_id' => $this->vehicle_group_id,
            'vehicle_group_id' => $this->group_id,
            'id' => $this->value
        ]);

        $query->andFilterWhere(['like' , 'name_fa' , $this->name_fa])
            ->andFilterWhere(['like' , 'name_en' , $this->name_en])
            ->andFilterWhere(['like' , 'name_fa' , $this->name]);


        return $data;

    }
}