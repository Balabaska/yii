<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Child;

/**
 * ChildSearch represents the model behind the search form of `app\models\Child`.
 */
class ChildSearch extends Child
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['C'], 'integer'],
            [['NAME', 'NUMBER_PHONE', 'DATA_OF_BIRTH', 'EMAIL'], 'safe'],
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
        $query = Child::find();

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
            'C' => $this->C,
            'DATA_OF_BIRTH' => $this->DATA_OF_BIRTH,
        ]);

        $query->andFilterWhere(['like', 'NAME', $this->NAME])
            ->andFilterWhere(['like', 'NUMBER_PHONE', $this->NUMBER_PHONE])
            ->andFilterWhere(['like', 'EMAIL', $this->EMAIL]);

        return $dataProvider;
    }
}
