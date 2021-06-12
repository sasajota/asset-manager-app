<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Asset;

/**
 * AssetSearch represents the model behind the search form of `backend\models\Asset`.
 */
class AssetSearch extends Asset
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'assignee_id', 'facility_id'], 'integer'],
            [['asset_name', 'introduction_date', 'asset_status', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
            [['asset_value'], 'number'],
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
        $query = Asset::find();

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
            'asset_value' => $this->asset_value,
            'assignee_id' => $this->assignee_id,
            'facility_id' => $this->facility_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'asset_status' => 'ACTIVE'
        ]);

        $query->andFilterWhere(['like', 'asset_name', $this->asset_name])
            ->andFilterWhere(['like', 'asset_status', $this->asset_status]);

        return $dataProvider;
    }
}
