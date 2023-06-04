<?php

namespace app\modules\order\models\search;

use app\modules\order\models\OrderInfoInquiry;
use yii\data\ActiveDataProvider;

class OrderInfoSearchModel extends OrderInfoInquiry
{


    public function rules()
    {
        return [
            [[
                'user_id',
                'insurance_line_id',
                'insurance_line_category_id',
                'order_id',
                'detail_id',
                'inquiry_id',
                'status'
            ] , 'safe']
        ];
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
            'detail_id' => $this->detail_id,
            'inquiry_id' => $this->inquiry_id,
            'order_id' => $this->order_id,
            'status' => $this->status
        ]);

        $query->orderBy(['created_at' => SORT_DESC]);
        return $data;

    }

}