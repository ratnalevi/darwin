<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EmployeeData;

/**
 * EmployeeDataSearch represents the model behind the search form about `common\models\EmployeeData`.
 */
class EmployeeDataSearch extends EmployeeData
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'emp_exp', 'emp_salary'], 'integer'],
            [['emp_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = EmployeeData::find();

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
            'emp_exp' => $this->emp_exp,
            'emp_salary' => $this->emp_salary,
        ]);

        $query->andFilterWhere(['like', 'emp_name', $this->emp_name]);

        return $dataProvider;
    }
}
