<?php

namespace backend\controllers;

use backend\components\Steppy;
use backend\models\Production;
use backend\models\ProductionSearch;
use backend\models\Recipe;
use Yii;
use yii\db\Query;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UnprocessableEntityHttpException;

/**
 * ProductionController implements the CRUD actions for Production model.
 */
class ProductionController extends Controller
{
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
     * Lists all Production models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductionSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Returns predicting average cost of single unit of product made.
     */
    public function actionCost()
    {
        $this->response->format = 'json';

        if ($this->request->isPost) {

            // Get recipe ID and production quantity from post data
            $recipe_id = $this->request->post('recipe_id');
            $production_qty = $this->request->post('production_qty');

            // Fetch recipe details including its ingredients and products
            $recipe = Recipe::find()->where(['id' => $recipe_id])->with("product", "ingredients", "ingredients.product")->one();

            if (!$recipe) {
                throw new NotFoundHttpException("Recipe not found!");
            }

            // Cost of production includes sum of price multiplied by production quantity
            $total_production_cost = 0;

            foreach ($recipe->ingredients as $ingredient) {
                $steppy = new Steppy();
                $steppy->query = $ingredient->product->getStocks();
                $steppy->column = 'qty';
                $steppy->quantity = $ingredient->qty * $production_qty;

                $ingredient_cost = $steppy->run(function($record, $unproceed_qty){
                    if ($record->qty < $unproceed_qty) {
                        return $record->qty * $record->price;
                    } else {
                        return $unproceed_qty * $record->price;
                    }
                }, false);

                if($ingredient_cost == false){
                    throw new UnprocessableEntityHttpException("Ingredient is not enough on stock!");
                }else{
                    $total_production_cost += $ingredient_cost;
                }
            }

            return round($total_production_cost / $production_qty, 2);
        }
    }

    /**
     * Displays a single Production model.
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
     * Creates a new Production model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Production();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                foreach ($model->recipe->ingredients as $ingredient) {
                    $steppy = new Steppy();
                    $steppy->query = $ingredient->product->getStocks();
                    $steppy->column = 'qty';
                    $steppy->quantity = $ingredient->qty * $model->qty;
                    $steppy->run();
                }
    


                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Production model.
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
     * Deletes an existing Production model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Production model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Production the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Production::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
