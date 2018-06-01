<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Departamentos;
use backend\models\Municipios;

/* @var $this yii\web\View */
/* @var $model backend\models\Clientes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cupo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'departamento_id')->dropDownList(
        ArrayHelper::map(Departamentos::find()->all(), 'id', 'nombre'),
        ['prompt' => '..::Seleccione::..',
            'onchange' => '$.post("index.php?r=municipios/lists&id=' . ' "+$(this).val(), function(data){
                $("select#clientes-municipio_id").html(data);
            });'
        ]
    )
    ?>
    <?= $form->field($model, 'municipio_id')->dropDownList(
        ArrayHelper::map(Municipios::find()->all(), 'id', 'nombre_municipio'),
        ['prompt' => '..::Seleccione::..']
    )
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
