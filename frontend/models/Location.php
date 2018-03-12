<?php

namespace frontend\models;
use yii\data\ActiveDataProvider;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property int $location_id
 * @property string $zip_code
 * @property string $city
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zip_code', 'city'], 'required'],
            [['zip_code', 'city'], 'string', 'max' => 200],
        ];
    }
    


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'location_id' => 'Location ID',
            'zip_code' => 'Zip Code',
            'city' => 'City',
        ];
    }
    public function search($params)
    {
        $query = Location::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        //if (!$this->validate()) {
         if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }


        $query->orFilterWhere(['like', 'zip_code', $this->globalSearch])
            ->orFilterWhere(['like', 'city', $this->globalSearch]);

        return $dataProvider;
    }
}
