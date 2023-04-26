<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this*/
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fornecedores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="supplier-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Novo Fornecedor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'attribute' => 'id',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a($model->id, ['view', 'id' => $model->id]);
                },
            ],
            'cnpj',
            'razao_social',
            'cep',
            'phone',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
