<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ApartmentsC;

/**
 * ApartmentsCSearch represents the model behind the search form of `backend\models\ApartmentsC`.
 */
class ApartmentsCSearch extends ApartmentsC
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'floor_num', 'num', 'status'], 'integer'],
            [['money', 'total_area', 'living_space', 'balcony_area'], 'number'],
            [['ru', 'en', 'ge', 'he'], 'safe'],
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
        $query = ApartmentsC::find();

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
            'floor_num' => $this->floor_num,
            'num' => $this->num,
            'money' => $this->money,
            'total_area' => $this->total_area,
            'living_space' => $this->living_space,
            'balcony_area' => $this->balcony_area,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'ru', $this->ru])
            ->andFilterWhere(['like', 'en', $this->en])
            ->andFilterWhere(['like', 'ge', $this->ge])
            ->andFilterWhere(['like', 'he', $this->he]);

        return $dataProvider;
    }
}
