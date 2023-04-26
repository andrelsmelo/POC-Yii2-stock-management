<?php

use yii\helpers\Html;

/** @var yii\web\View $this*/
/** @var app\models\Supplier $model */

$this->title = 'Atualizar Fornecedor: ' . $model->razao_social;
$this->params['breadcrumbs'][] = ['label' => 'Fornecedores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->razao_social, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="supplier-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
