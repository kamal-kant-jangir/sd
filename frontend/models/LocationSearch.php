<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Location;

/**
 * LocationSearch represents the model behind the search form of `frontend\models\Location`.
 */
class LocationSearch extends Location
{
    /**
     * @inheritdoc
     */
    public $globalSearch;
    public function rules()
    {
        return [
            [['location_id'], 'integer'],
            [['zip_code','globalSearch', 'city'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Location::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,  
            'pagination'=>['pageSize'=>5,],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'location_id' => $this->location_id,
            'zip_code' => $this->zip_code,
            'city' => $this->city,
        ]);

        $query->orFilterWhere(['like', 'zip_code', $this->globalSearch])
            ->orFilterWhere(['like', 'city', $this->globalSearch]);

        return $dataProvider;
    }
}
