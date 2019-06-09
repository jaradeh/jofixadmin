<?php

namespace backend\controllers;

use Yii;
use backend\models\Technicians;
use backend\models\TechniciansSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;
use backend\models\TechniciansAssignedServices;
use backend\models\Requests;

/**
 * TechniciansController implements the CRUD actions for Technicians model.
 */
class TechniciansController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                ],
            ],
        ];
    }

    /**
     * Lists all Technicians models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new TechniciansSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Technicians model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function actionFinance() {
        if (isset($_GET['searchID'])) {
            $techID = $_GET['techID'];
            $dateFrom = $_GET['dateFrom'];
            $dateTo = $_GET['dateTo'];
            if ($dateFrom != "none") {
                $dateFrom = strtotime($dateFrom);
            }
            if ($dateTo != "none") {
                $dateTo = strtotime($dateTo);
            }
            if ($techID != "none" && $dateFrom != "none" && $dateTo != "none") { // if all
                $getAllRequests = Requests::find()->where(['technician_id' => $techID])->andWhere(['between', 'date_created', $dateFrom, $dateTo])->all();
            } else if ($techID == "none" && $dateFrom != "none" && $dateTo != "none") { // if date from & to
                $getAllRequests = Requests::find()->andWhere(['between', 'date_created', $dateFrom, $dateTo])->all();
            } else if ($techID == "none" && $dateFrom != "none" && $dateTo == "none") { // if date from
                $getAllRequests = Requests::find()->andWhere(['between', 'date_created', $dateFrom, time()])->all();
            } else if ($techID == "none" && $dateFrom == "none" && $dateTo == "none") { // if date to
                $getAllRequests = Requests::find()->andWhere(['between', 'date_created', $dateFrom, time()])->all();
            } else if ($techID != "none" && $dateFrom == "none" && $dateTo == "none") { // if tech
                $getAllRequests = Requests::find()->where(['technician_id' => $techID])->all();
            } else {
                $getAllRequests = Requests::find()->all();
            }

            return $this->render('finance', [
                        'data' => $getAllRequests,
            ]);
        } else {
            $getAllRequests = Requests::find()->all();
            return $this->render('finance', [
                        'data' => $getAllRequests,
            ]);
        }
    }

    /**
     * Creates a new Technicians model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Technicians();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $post = Yii::$app->request->post();
            $post = $post['Technicians'];

            function manageImage($image) {
                $image_extention = $image->extension;
                if ($image_extention == "jpg" || $image_extention == "jpeg" || $image_extention == "png") {
                    if ($image->saveAs($full_path = dirname(__FILE__) . '/../../' . "/backend/web/media/technicians/original/" . $path = time() . "_" . Yii::$app->security->generateRandomString() . '.' . $image->extension)) {

//                        Image::resize($full_path, 60, 42)
//                                ->resize(new Box(60, 42))
//                                ->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/car_logo/" . $path, ['quality' => 50]);

                        return $path;
                    } else {
                        return "error";
                    }
                } else {
                    return "not image";
                }
            }

            $path = $model->image = UploadedFile::getInstance($model, "image");
            if (($model->image)) {
                $manage_image = manageImage($model->image);
                if ($manage_image == "not image") {
                    Yii::$app->session->setFlash('error', 'images must be image (jpg or jpeg or png');
                    return $this->redirect(['technicians/create']);
                } else if ($manage_image == "error") {
                    Yii::$app->session->setFlash('error', 'Something went wrong, could not upload images');
                    return $this->redirect(['technicians/create']);
                } else {
                    $model->image = $manage_image;
                    Yii::$app->session->setFlash('success', 'image successfully uploaded!');
                }
            } else {
                $model->image = NULL;
            }

            $model->date_created = time();
            $model->date_edited = time();
            $model->password = md5($post['password']);
            $model->save();

            $assignedServices = $post['profession'];
            foreach ($assignedServices as $assignedService => $service) {
                $techID = $model->id;
                $serviceID = $service;
                $techAssigned = new TechniciansAssignedServices();
                $techAssigned->tech_id = $techID;
                $techAssigned->service_id = $serviceID;
                $techAssigned->save();
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Technicians model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model2 = new Technicians();
        $old_image = $model->image;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            function manageImage($image) {
                $image_extention = $image->extension;
                if ($image_extention == "jpg" || $image_extention == "jpeg" || $image_extention == "png") {
                    if ($image->saveAs($full_path = dirname(__FILE__) . '/../../' . "/backend/web/media/technicians/original/" . $path = time() . "_" . Yii::$app->security->generateRandomString() . '.' . $image->extension)) {
//                   
//                        Image::resize($full_path, 60, 42)
//                                ->resize(new Box(60, 42))
//                                ->save(dirname(__FILE__) . '/../../' . "/frontend/web/media/car_logo/" . $path, ['quality' => 50]);

                        return $path;
                    } else {
                        return "error";
                    }
                } else {
                    return "not image";
                }
            }

            $model->image = UploadedFile::getInstance($model, 'image');
            if (isset($model->image)) {
                $manage_image = manageImage($model->image);
                if ($manage_image == "not image") {
                    Yii::$app->session->setFlash('error', 'image must be image (jpg or jpeg or png');
                    return $this->redirect(['technicians/update/' . $model->id]);
                } else if ($manage_image == "error") {
                    Yii::$app->session->setFlash('error', 'Something went wrong, could not upload images');
                    return $this->redirect(['technicians/update/' . $model->id]);
                } else {
                    $model->image = $manage_image;
                }
            } else {
                $model->image = $old_image;
            }
            $model->date_edited = time();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Technicians model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Technicians model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Technicians the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Technicians::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
