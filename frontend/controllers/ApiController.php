<?php

namespace frontend\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use backend\models\Services;
use backend\models\Technicians;
use backend\models\Users;
use backend\models\Requests;

/**
 * Province controller.
 */
class ApiController extends Controller {

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                //  'currencies' => ['get'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

    public function actionIndex() {
        
    }

    public $globalServiceImageUrl = 'http://admin.jo-fix.com/backend/web/media/service/original/';
    public $globalTechsImageUrl = 'http://admin.jo-fix.com/backend/web/media/technicians/original/';

    public function errorMessage($ID, $errorMsg) {
        $errorMessage = array('ErrorMessage' => $errorMsg);
        Yii::$app->helper->response(200, ['status' => $ID, 'data' => $errorMessage]);
        die();
    }

    public function actionGetservices() {
        $request = Yii::$app->request;
        $token = $request->post('tokens', 0);

        $getServices = Services::find()->orderBy(['id' => SORT_DESC])->asArray()->all();
        $arraySize = sizeof($getServices);
        for ($i = 0; $i < $arraySize; $i++) {
            $getServices[$i]['image'] = $this->globalServiceImageUrl . $getServices[$i]['image'];
        }

        Yii::$app->helper->response(200, ['status' => 0, 'data' => $getServices]);
    }

    public function actionGettechs() {
        $request = Yii::$app->request;
        $token = $request->post('tokens', 0);

        $getTechs = Technicians::find()->asArray()->all();
        $arraySize = sizeof($getTechs);
        for ($i = 0; $i < $arraySize; $i++) {
            $getTechs[$i]['image'] = $this->globalTechsImageUrl . $getTechs[$i]['image'];
        }

        Yii::$app->helper->response(200, ['status' => 0, 'data' => $getTechs]);
    }

    public function actionLogin() {
        $request = Yii::$app->request;
        $token = $request->post('tokens', 0);
        $phone = $request->post('phone');
        $password = $request->post('password');

        if (!$phone) {
            Yii::$app->helper->response(200, ['status' => 100, 'data' => 'Phone cannot be empty ']);
        }
        if (!$password) {
            Yii::$app->helper->response(200, ['status' => 100, 'data' => 'Password cannot be empty ']);
        }
        $passwordMd5 = md5($password);
        $getUser = Technicians::find()->where(['phone' => $phone])->andWhere(['password' => $passwordMd5])->asArray()->one();
        if (sizeof($getUser) > 0) {
            $data = array(["id" => $getUser['id'], "name" => $getUser['name']]);
            Yii::$app->helper->response(200, ['status' => 0, 'id' => $getUser['id'], 'name' => $getUser['name']]);
        } else {
            Yii::$app->helper->response(200, ['status' => 100, 'data' => 'incorrect username or password ']);
        }
    }

    public function actionGetcurrentservices() {
        $request = Yii::$app->request;
        $userID = $request->post('techID');

        $getRequets = Requests::find()->select(['requests.*'])->leftJoin('services', '`services`.`id` = `requests`.`service_id`')->where(['requests.technician_id' => 1])->andWhere(['requests.status' => array(1,2,3)])->with('services')->asArray()->all();
        if (sizeof($getRequets) > 0) {
            $arraySize = sizeof($getRequets);
            for ($i = 0; $i < $arraySize; $i++) {
                $getRequets[$i]['services'][0]['image'] = $this->globalServiceImageUrl . $getRequets[$i]['services'][0]['image'];
                $getRequets[$i]['date_created'] = date('Y-m-d H:i:s A', $getRequets[$i]['date_created']);
                $location = $getRequets[$i]['location'];
                $location = explode(',', $location);
                $getRequets[$i]['lang'] = $location[0];
                $getRequets[$i]['lat'] = $location[1];
            }



            Yii::$app->helper->response(200, ['status' => 0, 'data' => $getRequets]);
        } else {
            Yii::$app->helper->response(200, ['status' => 100, 'data' => false]);
        }
    }

    public function actionGethistoryservices() {
        $request = Yii::$app->request;
        $userID = $request->post('techID');

        $getRequets = Requests::find()->select(['requests.*'])->leftJoin('services', '`services`.`id` = `requests`.`service_id`')->where(['requests.technician_id' => 1])->andWhere(['requests.status' => array(4,5)])->with('services')->asArray()->all();
        if (sizeof($getRequets) > 0) {
            $arraySize = sizeof($getRequets);
            for ($i = 0; $i < $arraySize; $i++) {
                $getRequets[$i]['services'][0]['image'] = $this->globalServiceImageUrl . $getRequets[$i]['services'][0]['image'];
                $getRequets[$i]['date_created'] = date('Y-m-d H:i:s A', $getRequets[$i]['date_created']);
                $location = $getRequets[$i]['location'];
                $location = explode(',', $location);
                $getRequets[$i]['lang'] = $location[0];
                $getRequets[$i]['lat'] = $location[1];
            }
            Yii::$app->helper->response(200, ['status' => 0, 'data' => $getRequets]);
        } else {
            Yii::$app->helper->response(200, ['status' => 100, 'data' => false]);
        }
    }
    
    
    
    
    public function actionChangestatus() {
        $request = Yii::$app->request;
        $requestID = $request->post('requestID');
        $status = $request->post('status');
        if(!$status){
            Yii::$app->helper->response(200, ['status' => 100, 'data' => 'status cannot be empty' ]);
        }
        if(!$requestID){
            Yii::$app->helper->response(200, ['status' => 100, 'data' => 'request id cannot be empty']);
        }
        $model = Requests::findOne($requestID);
        $model->status = $status;
        if ($model->save()) {
            Yii::$app->helper->response(200, ['status' => 0, 'data' => true]);
        } else {
            Yii::$app->helper->response(200, ['status' => 100, 'data' => false]);
        } 
        
    }

}
