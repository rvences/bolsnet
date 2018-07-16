<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Cvpersonal;

/**
 * CvpersonalSearch represents the model behind the search form of `common\models\Cvpersonal`.
 */
class CvpersonalSearch extends Cvpersonal
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'estadocivil_id', 'entfed_id'], 'integer'],
            [['nombre', 'apaterno', 'amaterno', 'rfc', 'curp', 'fnac', 'sexo', 'tel_ofna', 'tel_ofna_ext', 'tel_movil', 'tel_casa_lada', 'tel_casa', 'correo', 'municipio', 'colonia', 'cp', 'calle', 'numero', 'entrecalle', 'created_at', 'updated_at'], 'safe'],
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
        $query = Cvpersonal::find();

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
            'user_id' => $this->user_id,
            'fnac' => $this->fnac,
            'estadocivil_id' => $this->estadocivil_id,
            'entfed_id' => $this->entfed_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apaterno', $this->apaterno])
            ->andFilterWhere(['like', 'amaterno', $this->amaterno])
            ->andFilterWhere(['like', 'rfc', $this->rfc])
            ->andFilterWhere(['like', 'curp', $this->curp])
            ->andFilterWhere(['like', 'sexo', $this->sexo])
            ->andFilterWhere(['like', 'tel_ofna', $this->tel_ofna])
            ->andFilterWhere(['like', 'tel_ofna_ext', $this->tel_ofna_ext])
            ->andFilterWhere(['like', 'tel_movil', $this->tel_movil])
            ->andFilterWhere(['like', 'tel_casa_lada', $this->tel_casa_lada])
            ->andFilterWhere(['like', 'tel_casa', $this->tel_casa])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'municipio', $this->municipio])
            ->andFilterWhere(['like', 'colonia', $this->colonia])
            ->andFilterWhere(['like', 'cp', $this->cp])
            ->andFilterWhere(['like', 'calle', $this->calle])
            ->andFilterWhere(['like', 'numero', $this->numero])
            ->andFilterWhere(['like', 'entrecalle', $this->entrecalle]);

        return $dataProvider;
    }
}
