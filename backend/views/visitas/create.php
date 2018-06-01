<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Visitas */

$this->title = 'Create Visitas';
$this->params['breadcrumbs'][] = ['label' => 'Visitas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visitas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
