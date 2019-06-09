<?php

namespace backend\controllers;

use Yii;
use backend\models\Services;
use backend\models\ServicesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UploadForm;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;

/**
 * ServicesController implements the CRUD actions for Services model.
 */
class ServicesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Services models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Services model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Services model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Services();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            function manageImage($image) {
                $image_extention = $image->extension;
                if ($image_extention == "jpg" || $image_extention == "jpeg" || $image_extention == "png") {
                    if ($image->saveAs($full_path = dirname(__FILE__) . '/../../' . "/backend/web/media/service/original/" . $path = time() . "_" . Yii::$app->security->generateRandomString() . '.' . $image->extension)) {

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
                    return $this->redirect(['services/create']);
                } else if ($manage_image == "error") {
                    Yii::$app->session->setFlash('error', 'Something went wrong, could not upload images');
                    return $this->redirect(['services/create']);
                } else {
                    $model->image = $manage_image;
                    Yii::$app->session->setFlash('success', 'image successfully uploaded!');
                }
            } else {
                $model->image = NULL;
            }

            $model->date_created = time();
            $model->date_edited = time();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Services model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $model2 = new Services();
        $old_image = $model->image;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            function manageImage($image) {
                $image_extention = $image->extension;
                if ($image_extention == "jpg" || $image_extention == "jpeg" || $image_extention == "png") {
                    if ($image->saveAs($full_path = dirname(__FILE__) . '/../../' . "/backend/web/media/service/original/" . $path = time() . "_" . Yii::$app->security->generateRandomString() . '.' . $image->extension)) {
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
                    return $this->redirect(['services/update/' . $model->id]);
                } else if ($manage_image == "error") {
                    Yii::$app->session->setFlash('error', 'Something went wrong, could not upload images');
                    return $this->redirect(['services/update/' . $model->id]);
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
     * Deletes an existing Services model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Services model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Services the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Services::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
