<?php

namespace frontend\controllers;

use common\models\Cvarchivos;
use common\models\Cvcursos;
use common\models\Cvidiomas;
use common\models\Cvnivelestudio;
use common\models\Cvexperiencia;
use common\models\Cvpuestos;
use Yii;
use common\models\Cvpersonal;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;



use common\models\Model;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
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
                        //'actions' => ['index', 'create', 'update', 'delete', 'update-archivos', 'update-nivel-estudio', 'update-experiencia', 'update-puestos', 'update-cursos', 'update-idiomas'],
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
        $user = Cvpersonal::find('id')->where(['user_id' => Yii::$app->user->id])->one();
        if ($user !== null) {
            return $this->redirect(['cvpersonal/update', 'id' => $user->id]);
        } else {
            return $this->redirect(['cvpersonal/create']);
        }
    }

    /**
     * Displays a single Cvpersonal model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cvpersonal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cvpersonal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['update', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cvpersonal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        // Restringiendo que solo el usuario logueado sea el que puede modificar su informacion
        $user = Cvpersonal::find('id')->where(['user_id' => Yii::$app->user->id])->one();

        if ($user->id == $id) {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['update', 'id' => $model->id]);
            }


            return $this->render('update', [
                'model' => $model,
                'estado' => $model->estadoBolsa(),
            ]);
        }
        throw new NotFoundHttpException('El usuario esta bloqueado para actualizar.');


    }

    /**
     * Deletes an existing Cvpersonal model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

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


    public function actionUpdateArchivos___temp()
    {
        $id = Cvpersonal::find('id')->where(['user_id' => Yii::$app->user->id])->one();

        $modelPersonal = $this->findModel($id->id);

        $modelsArchivos = $modelPersonal->cvarchivos;


        return $this->render('update-archivos', [
            'modelPersonal' => $modelPersonal,
            'estado' => $modelPersonal->estadoBolsa(),
        ]);





    }

    public function actionUpdateNivelEstudio()
    {
        $id = Cvpersonal::find('id')->where(['user_id' => Yii::$app->user->id])->one();

        $model = $this->findModel($id->id);
/*
        echo "ID Cvpersonal";
        echo "<pre>";
        print_r($id);
        echo "</pre>";


        echo Yii::$app->user->id . "AAAA Cvpersonal";
        echo "<pre>";
        print_r($model);
        echo "</pre>"; exit;*/
        $modelsNE = $model->cvnivelestudios;

        if ($model->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsNE, 'id', 'id');
            $modelsNE = Model::createMultiple(Cvnivelestudio::classname(), $modelsNE);
            Model::loadMultiple($modelsNE, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsNE, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsNE),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsNE) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Cvnivelestudio::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsNE as $modelNE) {
                            $modelNE->cvpersonal_id = $model->id;
                            if (! ($flag = $modelNE->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['update-nivel-estudio', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update-nivel-estudio', [
            'model' => $model,
            'modelsNE' => (empty($modelsNE)) ? [new Cvnivelestudio()] : $modelsNE,
            'estado' => $model->estadoBolsa(),


        ]);
    }

    public function actionUpdateExperiencia()
    {
        $id = Cvpersonal::find()->where(['user_id' => Yii::$app->user->id])->one();
        $modelPersonal = $this->findModel($id->id);
        $modelsExperiencia = $modelPersonal->cvexperiencias;

        if ($modelPersonal->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsExperiencia, 'id', 'id');
            $modelsExperiencia = Model::createMultiple(Cvexperiencia::class, $modelsExperiencia);
            Model::loadMultiple($modelsExperiencia, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsExperiencia, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsExperiencia),
                    ActiveForm::validate($modelPersonal)
                );
            }

            // validate all models
            $valid = $modelPersonal->validate();
            $valid = Model::validateMultiple($modelsExperiencia) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelPersonal->save(false)) {
                        if (! empty($deletedIDs)) {
                            Cvexperiencia::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsExperiencia as $modelExperiencia) {
                            $modelExperiencia->cvpersonal_id = $modelPersonal->id;
                            if (! ($flag = $modelExperiencia->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['cvpersonal/update-experiencia', 'id' => $modelPersonal->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update-experiencia', [
            'modelPersonal' => $modelPersonal,
            'modelsExperiencia' => (empty($modelsExperiencia)) ? [new Cvexperiencia()] : $modelsExperiencia,
            'estado' => $modelPersonal->estadoBolsa(),

        ]);
    }

    public function actionUpdateCursos()
    {
        $id = Cvpersonal::find('id')->where(['user_id' => Yii::$app->user->id])->one();
        $modelPersonal = $this->findModel($id->id);
        $modelsCurso = $modelPersonal->cvcursos;

        if ($modelPersonal->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsCurso, 'id', 'id');
            $modelsCurso = Model::createMultiple(Cvcursos::class, $modelsCurso);
            Model::loadMultiple($modelsCurso, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsCurso, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsCurso),
                    ActiveForm::validate($modelPersonal)
                );
            }

            // validate all models
            $valid = $modelPersonal->validate();
            $valid = Model::validateMultiple($modelsCurso) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelPersonal->save(false)) {
                        if (! empty($deletedIDs)) {
                            Cvexperiencia::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsCurso as $modelCurso) {
                            $modelCurso->cvpersonal_id = $modelPersonal->id;
                            if (! ($flag = $modelCurso->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['update-cursos', 'id' => $modelPersonal->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update-cursos', [
            'modelPersonal' => $modelPersonal,
            'modelsCurso' => (empty($modelsCurso)) ? [new Cvcursos()] : $modelsCurso,
            'estado' => $modelPersonal->estadoBolsa(),

        ]);
    }

    public function actionUpdateIdiomas()
    {
        $id = Cvpersonal::find('id')->where(['user_id' => Yii::$app->user->id])->one();
        $modelPersonal = $this->findModel($id->id);
        $modelsIdioma = $modelPersonal->cvidiomas;

        if ($modelPersonal->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsIdioma, 'id', 'id');
            $modelsIdioma = Model::createMultiple(Cvidiomas::class, $modelsIdioma);
            Model::loadMultiple($modelsIdioma, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsIdioma, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsIdioma),
                    ActiveForm::validate($modelPersonal)
                );
            }

            // validate all models
            $valid = $modelPersonal->validate();
            $valid = Model::validateMultiple($modelsIdioma) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelPersonal->save(false)) {
                        if (! empty($deletedIDs)) {
                            Cvidiomas::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsIdioma as $modelIdioma) {
                            $modelIdioma->cvpersonal_id = $modelPersonal->id;
                            if (! ($flag = $modelIdioma->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['update-idiomas', 'id' => $modelPersonal->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update-idiomas', [
            'modelPersonal' => $modelPersonal,
            'modelsIdioma' => (empty($modelsIdioma)) ? [new Cvidiomas()] : $modelsIdioma,
            'estado' => $modelPersonal->estadoBolsa(),


        ]);
    }

    public function actionUpdatePuestos()
    {
        $id = Cvpersonal::find()->where(['user_id' => Yii::$app->user->id])->one();
        $modelPersonal = $this->findModel($id->id);
        $modelsPuesto = $modelPersonal->cvpuestos;

        if ($modelPersonal->load(Yii::$app->request->post())) {

            $oldIDs = ArrayHelper::map($modelsPuesto, 'id', 'id');
            $modelsPuesto = Model::createMultiple(Cvpuestos::class, $modelsPuesto);
            Model::loadMultiple($modelsPuesto, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($modelsPuesto, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsPuesto),
                    ActiveForm::validate($modelPersonal)
                );
            }

            // validate all models
            $valid = $modelPersonal->validate();
            $valid = Model::validateMultiple($modelsPuesto) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelPersonal->save(false)) {
                        if (! empty($deletedIDs)) {
                            Cvpuestos::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($modelsPuesto as $modelPuesto) {
                            $modelPuesto->cvpersonal_id = $modelPersonal->id;
                            if (! ($flag = $modelPuesto->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['cvpersonal/update-puestos', 'id' => $modelPersonal->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('update-puestos', [
            'modelPersonal' => $modelPersonal,
            'modelsPuesto' => (empty($modelsPuesto)) ? [new Cvpuestos()] : $modelsPuesto,
            'estado' => $modelPersonal->estadoBolsa(),


        ]);
    }

    public function actionCreateArchivos() {
        $id = Cvpersonal::find()->where(['user_id' => Yii::$app->user->id])->one();
        $modelPersonal = $this->findModel($id->id);

        $archivos = new ActiveDataProvider([
            'query' => Cvarchivos::find()->where(['cvpersonal_id' => $id->id])->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $model = new Cvarchivos();
        if ($model->load(Yii::$app->request->post())) {
            $model->image = UploadedFile::getInstances($model, 'image');
            foreach ($model->image as $i => $image) {
                $model = new Cvarchivos();
                $model->cvpersonal_id = $id->id;
                $model->path = Yii::$app->basePath . '/web/uploads/';
                $model->filename = $image->name;
                $image_info = explode(".", $image->name);
                $ext = end($image_info);
                $model->archivo = Yii::$app->security->generateRandomString().".{$ext}";
                $path = $model->path . $model->archivo;
                $model->save(false);
                $image->saveAs($path);
            }

            if ($model->save(false)) {
                return $this->redirect(['cvpersonal/create-archivos', 'id' => $model->id]);
            }  else {
                var_dump ($model->getErrors()); die();
            }
        }
        return $this->render('create-archivos', [
            'modelPersonal' => $modelPersonal,
            'model' => $model,
            'archivos' => $archivos,
            'estado' => $modelPersonal->estadoBolsa(),

        ]);

    }

    public function actionDeleteArchivos($id)
    {

        $model = Cvarchivos::find()->where(['id' => $id])->one();

        if ($model->delete()) {
            if (!$model->deleteImage()) {
                Yii::$app->session->setFlash('error', 'Error borrando archivo');
            }
        }

        return $this->redirect(['cvpersonal/create-archivos']);
    }
}
