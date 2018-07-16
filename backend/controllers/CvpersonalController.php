<?php

namespace backend\controllers;

use common\models\Cvcursos;
use common\models\Cvexperiencia;
use common\models\Cvidiomas;
use common\models\Cvnivelestudio;
use common\models\Cvpuestos;
use Yii;
use common\models\Cvpersonal;
use backend\models\search\CvpersonalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CvpersonalController implements the CRUD actions for Cvpersonal model.
 */
class CvpersonalController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {

        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cvpersonal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CvpersonalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cvpersonal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $modelEstudios = Cvnivelestudio::find()->where(['cvpersonal_id' => $id])->all();
        $modelExperiencias = Cvexperiencia::find()->where(['cvpersonal_id' => $id])->all();
        $modelPuestos = Cvpuestos::find()->where(['cvpersonal_id' => $id])->all();
        $modelCursos = Cvcursos::find()->where(['cvpersonal_id' => $id])->all();
        $modelIdiomas = Cvidiomas::find()->where(['cvpersonal_id' => $id])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'estudios' => $modelEstudios,
            'experiencias' => $modelExperiencias,
            'puestos' => $modelPuestos,
            'cursos' => $modelCursos,
            'idiomas' => $modelIdiomas,

        ]);
    }

    /**
     * Creates a new Cvpersonal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed

    public function actionCreate()
    {
        $model = new Cvpersonal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
*/
    /**
     * Updates an existing Cvpersonal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cvpersonal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
*/
    /**
     * Finds the Cvpersonal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cvpersonal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cvpersonal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
