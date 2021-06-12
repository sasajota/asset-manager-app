<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Facility;

/**
 * FacilitySearch represents the model behind the search form of `backend\models\Facility`.
 */
class FacilitySearch extends Facility
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['facility_name', 'introduction_date', 'fac_address', 'details', 'facility_status', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['location_lat', 'location_lon'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Facility::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'introduction_date' => $this->introduction_date,
            'location_lat' => $this->location_lat,
            'location_lon' => $this->location_lon,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'facility_status' => 'ACTIVE'
        ]);

        $query->andFilterWhere(['like', 'facility_name', $this->facility_name])
            ->andFilterWhere(['like', 'fac_address', $this->fac_address])
            ->andFilterWhere(['like', 'details', $this->details])
            ->andFilterWhere(['like', 'facility_status', $this->facility_status]);

        return $dataProvider;
    }
}
