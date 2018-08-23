<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Cvpuestos;
use yii\db\Expression;

/**
 * CvpuestosSearch represents the model behind the search form of `common\models\Cvpuestos`.
 */
class CvpuestosSearch extends Cvpuestos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cvpersonal_id', 'puestos_id'], 'integer'],
            [['buscar_nombre_completo', 'seguimiento_id'], 'safe'],
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
        //$query = Cvpuestos::find();

        $nombreCompleto = new Expression('CONCAT_WS(" ", nombre, apaterno, amaterno)');

        $query = Cvpuestos::find();
        $query-> select([
            'cvpuestos.*',
            'cvpersonal.user_id', 'date(cvpersonal.created_at) as created_at', 'cvpersonal.seguimiento_id',

            //  'cpuestos.*',
            'buscar_nombre_completo' => $nombreCompleto,

        ]);

        $query->joinWith('cvpersonal');

        // SELECT `cvpuestos`.*, `cvpersonal`.`user_id`, `cvpersonal`.`estadocivil_id`, `cvpersonal`.`tel_ofna`, `cvpersonal`.`tel_ofna_ext`, `cvpersonal`.`tel_movil`, `cvpersonal`.`tel_casa_lada`, `cvpersonal`.`tel_casa`, `cvpersonal`.`correo`, `cvpersonal`.`created_at`, `cvpersonal`.`seguimiento_id`, CONCAT_WS(" ", nombre, apaterno, amaterno) AS `buscar_nombre_completo` FROM `cvpuestos` LEFT JOIN `cvpersonal` ON `cvpuestos`.`cvpersonal_id` = `cvpersonal`.`id` LIMIT 20
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes' =>  [
                    'buscar_nombre_completo' => [
                        'asc' => [(string)$nombreCompleto => SORT_ASC],
                        'desc' => [(string)$nombreCompleto => SORT_DESC],
                    ],

                ]

            ]
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
            'puestos_id' => $this->puestos_id,
        ]);

        $query->andFilterWhere(['like', 'created_at', $this->created_at])
            ->andFilterWhere(['like', $nombreCompleto, $this->buscar_nombre_completo])
            ->andFilterWhere(['like', 'seguimiento_id', $this->seguimiento_id])
        ;



        return $dataProvider;
    }
}
