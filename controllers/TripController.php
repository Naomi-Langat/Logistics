<?php

namespace app\controllers;

use app\models\Trip;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\TwilioHelper;

/**
 * TripController implements the CRUD actions for Trip model.
 */
class TripController extends Controller
{
    public function beforeAction($action){
        $this->enableCsrfValidation=false;
        return parent::beforeAction($action);
    }
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Trip models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Trip::find(),
           
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Trip model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Trip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Trip();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->DispatchRefNo = $model->generateRefNo();

                if ($model->save()) {
                    $model->vehicle->Status = 1;
                    $model->driver->Status = 1;
                    
                $model->vehicle->save(); 
                $model->driver->save();
                
                return $this->redirect(['/trip-details', 'id' => $model->id]);
                }
            }else{
                var_dump($model->errors).exit();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trip model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        
        $model->vehicle->Status = 0;
        $model->driver->Status = 0;

        $model->vehicle->save(); 
        $model->driver->save(); 

        return $this->redirect(['/site']);
    }

    /**
     * Finds the Trip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Trip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trip::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionSendSMS()
    {
        // Load Twilio credentials from Yii2 application configuration
        $accountSid = Yii::$app->params['twilio']['accountSid'];
        $authToken = Yii::$app->params['twilio']['authToken'];
        $twilioPhoneNumber = Yii::$app->params['twilio']['phoneNumber'];

        // Recipient's phone number
        $to = '+254715410907'; // Replace this with the actual recipient's phone number

        // Message content
        $message = 'Hello from Twilio! This is a test SMS message.';

        // Create TwilioHelper instance
        $twilioHelper = new TwilioHelper($accountSid, $authToken, $twilioPhoneNumber);

        // Send the SMS
        $twilioHelper->sendSMS($to, $message);

        return $this->render('sms_sent');
    }
}
