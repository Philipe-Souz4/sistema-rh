<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Funcionario $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="funcionario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nome',
            [   // formata CPF com mascara 999.999.999-99 ou null se tiver vazio
                'attribute' => 'cpf',
                'value' => !empty($model->cep)
                    ? preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "$1.$2.$3-$4", $model->cpf)
                    : null,
            ],
            'logradouro',
            [   // formata CEP com mascara 99999-999 ou null se tiver vazio
                'attribute' => 'cep',
                'value' => !empty($model->cep) 
                    ? preg_replace("/(\d{5})(\d{3})/", "$1-$2", $model->cep) 
                    : null,
            ],
            'cidade',
            'estado',
            'numero',
            'complemento',
            [
                'attribute' => 'cargo_id',
                'value' => function ($model) {
                    return $model->cargo ? $model->cargo->nome : 'Sem cargo';
                },
            ],
        ],
    ]) ?>

</div>
