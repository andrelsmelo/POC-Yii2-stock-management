<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this*/
/** @var app\models\Stock $model */

    $this->title = $model->product_id;
    $this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;

?>
<div class="product-view">

    <h1><?= Html::encode($this->title ?? '') ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->product_id ?? null], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Deletar', ['delete', 'id' => $model->product_id ?? null], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Você tem certeza que quer deletar esse item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'product_name',
                    'value' => $model->product->name ?? null,
                ],
                'product_id',
                'amount',
            ],
        ]) ?>

</div>

