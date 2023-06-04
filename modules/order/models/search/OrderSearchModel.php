<?php
namespace app\modules\order\models\search;

use app\modules\order\models\Order;
use yii\data\ActiveDataProvider;

class OrderSearchModel extends Order
{

    public function rules()
    {

        return[[['user_id' , 'insurance_company_id' , 'insurance_line_id' , 'insurance_line_category_id' , 'status' , 'insurance_code'] , 'safe']];

    }

    public function search(): ActiveDataProvider
    {
        $query = self::find();




        $data = new ActiveDataProvider([
            'query' => $query
        ]);

        $query->andFilterWhere([
            'user_id' => $this->user_id,
            'insurance_line_id' => $this->insurance_line_id,
            'insurance_line_category_id' => $this->insurance_line_category_id,
            'insurance_company_id' => $this->insurance_company_id,
            'insurance_code' => $this->insurance_code,
            'status' => $this->status
        ]);

        $query->orderBy(['created_at' => SORT_DESC]);
        return $data;

    }

}