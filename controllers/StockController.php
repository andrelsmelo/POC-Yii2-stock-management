<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Stock;
use app\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class StockController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Stock::find()->with('product'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCreate()
    {
        $model = new Stock();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // Verifica se o produto já existe na tabela de estoque
            $existingStock = Stock::findOne(['product_id' => $model->product_id]);
            if ($existingStock) {
                // Atualiza a quantidade de estoque existente
                $existingStock->amount += $model->amount;
                $existingStock->save(false);
                return $this->redirect(['view', 'id' => $existingStock->product_id]);
            } else {
                // Cria um novo registro de estoque
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->product_id]);
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'products' => Product::find()->all(),
        ]);
    }

    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->product_id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'products' => Product::find()->all(),
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        $model = Stock::findOne(['product_id' => $id]);
        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return $model;
    }
}
