<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Clientes;

/* @var $this yii\web\View */
/* @var $model backend\models\Visitas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="visitas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valor_neto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor_visita')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cliente_id')->dropDownList(
        ArrayHelper::map(Clientes::find()->all(), 'id', 'nombres'),
        ['prompt' => '..::Seleccione::..']
    )
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
