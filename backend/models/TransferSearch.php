<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Transfer;

/**
 * TransferSearch represents the model behind the search form of `backend\models\Transfer`.
 */
class TransferSearch extends Transfer
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'asset_id', 'assignee_id', 'facility_id'], 'integer'],
            [['transfer_status', 'created_at', 'updated_at', 'deleted_at'], 'safe'],
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
        $query = Transfer::find();

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
            'asset_id' => $this->asset_id,
            'assignee_id' => $this->assignee_id,
            'facility_id' => $this->facility_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'transfer_status' => 'ACTIVE'
        ]);

        $query->andFilterWhere(['like', 'transfer_status', $this->transfer_status])
            ->andFilterWhere(['like', 'transfer_status', $this->transfer_status]);

        return $dataProvider;
    }
}
