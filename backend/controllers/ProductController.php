<?php

namespace backend\controllers;

use backend\models\Ingredient;
use backend\models\Product;
use backend\models\ProductSearch;
use backend\models\Recipe;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
                'access' => [
                    'class' => \yii\filters\AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'], // Only authenticated users.
                        ],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();

        $dataProvider = $searchModel->search($this->request->queryParams);

        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Product recipes as a json.
     *
     * @return array
     */
    public function actionInfo($id)
    {
        $this->response->format = 'json';

        $product = $this->findModel($id);

        $info = $product->attributes;

        $info['recipes'] = array_map(function($recipe){
            $recipeInfo = $recipe->attributes;
            $recipeInfo['ingredients'] = array_map(function($ingredient){
                $ingredientInfo = $ingredient->attributes;
                $ingredientInfo['product'] = $ingredient->product->attributes;
                return $ingredientInfo;
            }, $recipe->getIngredients()->all());
            return $recipeInfo;
        }, $product->getRecipes()->all());

        return $info;
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $recipesProvider = new ActiveDataProvider([
            'query' => $this->findModel($id)
                ->getRecipes()
                ->with(['ingredients', 'ingredients.product']),
        ]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'recipesProvider' => $recipesProvider,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($redirect_to_production = false)
    {
        $model = new Product();


        if ($this->request->isPost) {



            if ($model->load($this->request->post())) {
                $model->image = UploadedFile::getInstance($model, 'image');
                if ($model->upload() && $model->save()) {
                    if ($redirect_to_production) {
                        \Yii::$app->session->setFlash('success', 'Product created successfully. Now you can create a production.');
                        return $this->redirect(['/production/create', 'product_id' => $model->id]);
                    }
                    return $this->redirect(['view', 'id' => $model->id]);

                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
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
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }
}
