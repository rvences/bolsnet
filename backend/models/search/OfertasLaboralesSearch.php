<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OfertasLaborales;

/**
 * OfertasLaboralesSearch represents the model behind the search form of `common\models\OfertasLaborales`.
 */
class OfertasLaboralesSearch extends OfertasLaborales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'edad_minima', 'edad_maxima', 'sueldo', 'experiencia', 'no_vacantes', 'puesto_id', 'estadocivil_id', 'horario_id', 'tcontratacion_id', 'profesion_id', 'nivelestudio_id', 'empresa_id', 'estadovacante_id'], 'integer'],
            [['actividades', 'conocimientos', 'infoadicional', 'sexo', 'created_at', 'updated_at'. 'vigencia'], 'safe'],
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
        $query = OfertasLaborales::find();

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
            'edad_minima' => $this->edad_minima,
            'edad_maxima' => $this->edad_maxima,
            'sueldo' => $this->sueldo,
            'experiencia' => $this->experiencia,
            'no_vacantes' => $this->no_vacantes,
            'vigencia' => $this->vigencia,
            'puesto_id' => $this->puesto_id,
            'estadocivil_id' => $this->estadocivil_id,
            'horario_id' => $this->horario_id,
            'tcontratacion_id' => $this->tcontratacion_id,
            'profesion_id' => $this->profesion_id,
            'nivelestudio_id' => $this->nivelestudio_id,
            'empresa_id' => $this->empresa_id,
            'estadovacante_id' => $this->estadovacante_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'actividades', $this->actividades])
            ->andFilterWhere(['like', 'conocimientos', $this->conocimientos])
            ->andFilterWhere(['like', 'infoadicional', $this->infoadicional])
            ->andFilterWhere(['like', 'sexo', $this->sexo]);

        return $dataProvider;
    }
}
