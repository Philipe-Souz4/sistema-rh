<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Cargo;

$cargos = ArrayHelper::map(Cargo::find()->all(), 'id', 'nome');
/** @var yii\web\View $this */
/** @var app\models\Funcionario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="funcionario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= // Mascara no campo CPF, remove antes de subir no branco
        $form->field($model, 'cpf')->widget(\yii\widgets\MaskedInput::class, [
            'mask' => '999.999.999-99',
            'clientOptions' => [
                'removeMaskOnSubmit' => true,
            ],
        ]) 
    ?>

    <?= $form->field($model, 'logradouro')->textInput(['maxlength' => true]) ?>

    <?= // Mascara no campo CEP, remove antes de subir no branco
        $form->field($model, 'cep')->widget(\yii\widgets\MaskedInput::class, [
            'mask' => '99999-999',
            'clientOptions' => [
                'removeMaskOnSubmit' => true,
            ],
        ])
    ?>

    <?= $form->field($model, 'cidade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'complemento')->textInput(['maxlength' => true]) ?>

    <?= 
        $form->field($model, 'cargo_id')->dropDownList(
            $cargos,
            ['prompt' => 'Selecione um cargo...']
        ) 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
