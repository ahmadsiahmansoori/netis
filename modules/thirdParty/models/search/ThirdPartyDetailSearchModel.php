<?php
namespace  app\modules\thirdParty\models\search;

use app\modules\thirdParty\models\ThirdPartyDetail;
use yii\data\ActiveDataProvider;

class ThirdPartyDetailSearchModel extends ThirdPartyDetail
{


    public function rules(): array
    {
        return [
            [[
                'order_id',
                'user_id',
                'order_detail_third_party_id',
                'status',
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
            'third_party_inquiry_id' => $this->third_party_inquiry_id,
            'status' => $this->status
        ]);

        $query->orderBy(['created_at' => SORT_DESC]);
        return $data;

    }

}