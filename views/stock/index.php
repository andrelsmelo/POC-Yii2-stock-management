<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estoque';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo item de estoque', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'Produto',
                'value' => function ($model) {
                    return $model->product->name;
                },
            ],
            [
                'attribute' => 'Categoria',
                'value' => function ($model) {
                    return $model->product->category->name;
                },
            ],
            [
                'attribute' => 'Quantidade',
                'value' => function ($model) {
                    return $model->amount;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
