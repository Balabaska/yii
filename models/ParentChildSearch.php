<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ParentChild;

/**
 * ParentChildSearch represents the model behind the search form of `app\models\ParentChild`.
 */
class ParentChildSearch extends ParentChild
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PC', 'fk_PR', 'fk_CH'], 'integer'],
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
        $query = ParentChild::find();

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
            'PC' => $this->PC,
            'fk_PR' => $this->fk_PR,
            'fk_CH' => $this->fk_CH,
        ]);

        return $dataProvider;
    }
}
