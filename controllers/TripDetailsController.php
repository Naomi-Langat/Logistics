<?php

namespace app\controllers;

use app\models\Trip;
use app\models\TripDetails;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * TripDetailsController implements the CRUD actions for TripDetails model.
 */
class TripDetailsController extends Controller
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
     * Lists all TripDetails models.
     *
     * @return string
     */
    public function actionIndex($id)
    {
        $model = new TripDetails();
        $dataProvider = new ActiveDataProvider([
            'query' => TripDetails::find()->where(['TripID' => $id]),
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);
        $model->TripID = $id;
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    public function actionStatus($id,$s)
    {
            $trip = Trip::findOne($id);
            if ($trip) {
                
                $trip->Status = $s;
                $trip->save();
                if ($s == 2) {
                $trip->vehicle->Status = 0;
                $trip->driver->Status = 0;
                    
                $trip->vehicle->save(); 
                $trip->driver->save();
                }
                return $this->redirect(['/site/']); 
            }
    }

    /**
     * Displays a single TripDetails model.
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
     * Creates a new TripDetails model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id=0)
    {
        $model = new TripDetails();
        $model->TripID = $id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

              return $this->redirect(['index','id'=>$model->TripID]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TripDetails model.
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
     * Deletes an existing TripDetails model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();

        return $this->redirect(['index','id'=>$model->TripID]);
    }

    /**
     * Finds the TripDetails model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TripDetails the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TripDetails::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
