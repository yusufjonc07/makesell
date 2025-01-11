<?php

namespace backend\controllers;

use backend\models\Customer;
use backend\models\Invoice;
use backend\models\Order;
use backend\models\Production;
use common\models\LoginForm;
use Yii;
use yii\captcha\CaptchaAction;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error', 'captcha', 'no-internet'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
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
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => CaptchaAction::className(),
                'fixedVerifyCode' => YII_ENV_TEST ? 'dwofneoi' : null,
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

        $date_filter = ['>=', 'created_at', date('Y-m-01')];

        $invoices = Invoice::find()->where($date_filter)->count();
        $clients = Customer::find()->where($date_filter)->count();
        $production = Production::find()->where($date_filter)->sum("qty*price");
        $sales = Order::find()->where($date_filter)->andWhere(['status' => 1])->sum("qty*price");

        $rate = $sales / $production * 100;

        $datasets = [
            [
                'label' => "Production",
                'backgroundColor' => "rgba(179,181,198,0.2)",
                'borderColor' => "rgb(56, 63, 123)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [65, 59, 90, 81, 56, 55, 40]
            ],
            [
                'label' => "Sales",
                'backgroundColor' => "rgba(85, 164, 81, 0.55)",
                'borderColor' => "rgb(58, 126, 93)",
                'pointBackgroundColor' => "rgba(85, 164, 81, 0.55)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => [28, 48, 40, 19, 96, 27, 100]
            ],
            [
                'label' => "Supply",
                'backgroundColor' => "rgba(153, 164, 81, 0.55)",
                'borderColor' => "rgb(115, 126, 58)",
                'pointBackgroundColor' => "rgba(85, 164, 81, 0.55)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => [28, 48, 40, 19, 96, 27, 100]
            ],
        ];

        return $this->render('index', compact('invoices', 'clients', 'production', 'sales', 'rate', 'datasets'));
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'blank';

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
     * Displays a blank page when no internet connection is available.
     */

    public function actionNoInternet()
    {

        

        $this->layout = 'blank';
        return $this->render('no-internet');
    }
}
