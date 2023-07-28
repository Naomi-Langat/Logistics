<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\helpers\Html;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Vehicles;
use app\models\Products;
use app\models\Transporters;
use app\models\TrackLocation;
use app\models\TripDetails;
use app\models\Trip;

class SiteController extends Controller
{
    public function beforeAction($action){
        $this->enableCsrfValidation=false;
        return parent::beforeAction($action);
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $trip = Trip::find()->where(['Status' => 1])->all();
        $DataArray = [];
        foreach ($trip as $trip) {
            $vehicle = Vehicles::findOne($trip->VehicleID);
            $tripDetails = TripDetails::find()->where(['TripID' => $trip->id])->all();
            $productArray = [];

            foreach ($tripDetails as $detail) {
                $product = Products::findOne($detail->ProductID);
                if ($product) {
                    $productArray[] = Html::a(
                        Html::tag('button', $product->ProductName . ' (' . $detail->Quantity . ' bags)', ['class' => 'btn btn-sm btn-info round']),
                        ['/trip-details', 'id' => $detail->id]
                    );                }
            }
            $productsString = implode('<br><br>', $productArray);
            $DataArray[] = [
                // 'Location' => $location ? $location->location : null,
                'DispatchRefNo' => Html::a(
                    '<i class="la la-dot-circle-o danger font-large-1 mr-1"></i>',
                    ['/trip/delete', 'id' => $trip->id],
                    [
                        'class' => 'delete-link',
                        'data-method' => 'post',
                        'data-confirm' => 'Are you sure you want to delete this record?',
                    ]
                    ) . Html::a($trip->DispatchRefNo, ['/trip-details','id'=>$trip->id]),
                'Date' => $trip->CreatedDate,
                'ProductName'=>$productsString,
                'Source' => $trip ? $trip->sourceStation->StationName : null,
                'Destination' => $trip ? $trip->destinationStation->StationName : null,
                'VehicleRegNo' => Html::a($vehicle ? $vehicle->REG_No : null, ['/vehicles/view','id'=>$vehicle->id]),
                'DriverName' => '<span class="avatar avatar-online"><img src="/app-assets/images/portrait/small/avatar-s-19.png" alt="avatar"></span>' . ($trip->driver->Surname . ' ' . $trip->driver->Othernames),
                'Location',
            ];
        }
        usort($DataArray, function ($a, $b) {
            return strtotime($b['Date']) - strtotime($a['Date']);
        });

        return $this->render('index', ['dataArray' => $DataArray]);
    }

    /**
     * Register action.
     *
     * @return Response|string
     */
    public function actionRegister()
    {
        
        Yii::$app->request->enableCsrfValidation = false;

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        $this->layout = 'main2';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            // Retrieve the redirect URL from the hidden field
            $redirectUrl = Yii::$app->request->post('redirectUrl', Yii::$app->homeUrl);
            
            // Redirect the user to the specified URL
            return $this->redirect($redirectUrl);
        } else {
            $model->password = '';

            return $this->render('register', [
                'model' => $model,
            ]);
        }
    }

     /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            
            return $this->goHome();
        }
        
        $this->layout = 'main2';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
