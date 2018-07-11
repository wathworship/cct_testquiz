<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Church;

/**
 * ChurchSearch represents the model behind the search form of `app\models\Church`.
 */
class ChurchSearch extends Church
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_church', 'id_pak'], 'integer'],
            [['church_name', 'church_date'], 'safe'],
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
        $query = Church::find();

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
            'id_church' => $this->id_church,
            'id_pak' => $this->id_pak,
            'church_date' => $this->church_date,
        ]);

        $query->andFilterWhere(['like', 'church_name', $this->church_name]);

        return $dataProvider;
    }
}
