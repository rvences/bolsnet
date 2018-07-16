<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Cvnivelestudio;

/**
 * CvnivelestudioSearch represents the model behind the search form of `common\models\Cvnivelestudio`.
 */
class CvnivelestudioSearch extends Cvnivelestudio
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cvpersonal_id', 'cnivelestudio_id', 'cprofesion_id'], 'integer'],
            [['escuela', 'certificado', 'titulo', 'cedula'], 'safe'],
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
        $query = Cvnivelestudio::find();

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
            'cvpersonal_id' => $this->cvpersonal_id,
            'cnivelestudio_id' => $this->cnivelestudio_id,
            'cprofesion_id' => $this->cprofesion_id,
        ]);

        $query->andFilterWhere(['like', 'escuela', $this->escuela])
            ->andFilterWhere(['like', 'certificado', $this->certificado])
            ->andFilterWhere(['like', 'titulo', $this->titulo])
            ->andFilterWhere(['like', 'cedula', $this->cedula]);

        return $dataProvider;
    }
}
