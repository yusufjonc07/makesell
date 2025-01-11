<?php

namespace backend\controllers;

use backend\components\BaseController;
use backend\models\DynamicModel;
use backend\models\Ingredient;
use backend\models\Product;
use backend\models\Recipe;
use Exception;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

/**
 * RecipeController implements the CRUD actions for Recipe model.
 */
class RecipeController extends BaseController
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
     * Lists all Recipe models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Recipe::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Recipe model.
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
     * Creates a new Recipe model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        

     

        $modelRecipe = new Recipe();
        $ingredientModels = [new Ingredient()];

        $modelRecipe->product_id = $id;

        if ($modelRecipe->load(Yii::$app->request->post())) {

            $modelsIngredient = DynamicModel::createMultiple(Ingredient::classname());
            DynamicModel::loadMultiple($modelsIngredient, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = 'json';
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsIngredient),
                    ActiveForm::validate($modelRecipe)
                );
            }

            // validate all models
            $valid = $modelRecipe->validate();

            $valid = DynamicModel::validateMultiple($modelsIngredient) && $valid;
            
            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelRecipe->save(false)) {
                        foreach ($modelsIngredient as $modelIngredient) {
                            $modelIngredient->recipe_id = $modelRecipe->id;
                            if (! ($flag = $modelIngredient->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['/product/view', 'id' => $modelRecipe->product_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }


        return $this->render('create', [
            'model' => $modelRecipe,
            'ingredientModels' => $ingredientModels,
        ]);
    }

    /**
     * Updates an existing Recipe model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ingredientModels = $model->ingredients ?? [new Ingredient()];

       
        if ($model->load(Yii::$app->request->post())) {

            

            $oldIDs = ArrayHelper::map($ingredientModels, 'id', 'id');
            $ingredientModels = DynamicModel::createMultiple(Ingredient::className(), $ingredientModels);
            DynamicModel::loadMultiple($ingredientModels, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($ingredientModels, 'id', 'id')));

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = 'json';
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($ingredientModels),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = DynamicModel::validateMultiple($ingredientModels) && $valid;

            if ($valid) {
               
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        if (! empty($deletedIDs)) {
                            Ingredient::deleteAll(['id' => $deletedIDs]);
                        }
                        foreach ($ingredientModels as $modelIngredient) {
                            $modelIngredient->recipe_id = $model->id;
                            if (! ($flag = $modelIngredient->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['/product/view', 'id' => $model->product_id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                    die($e->getMessage());
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'ingredientModels' => $ingredientModels,
        ]);
    }

    /**
     * Deletes an existing Recipe model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect($this->request->referrer);
    }

    /**
     * Finds the Recipe model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Recipe the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recipe::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(\Yii::t('app', 'The requested page does not exist.'));
    }
}
