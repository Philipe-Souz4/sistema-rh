<?php

use app\models\Funcionario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FuncionarioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Funcionarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cadastrar Funcionario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            [   // CPF com mascara 999.999.999-99 ou null se tiver vazio
                'attribute' => 'cpf',
                'value' => function ($model) {
                    if (empty($model->cpf)) {
                        return null; 
                    }
                    return $model->formattedCpf;
                },
                'contentOptions' => [
                    'style' => 'white-space: nowrap;'
                ],
            ],
            'logradouro',
            [   // CEP com mascara 99999-999 ou null se tiver vazio
                'attribute' => 'cep',
                'value' => function ($model) {
                    if (empty($model->cep)) {
                        return null; 
                    }
                    return $model->formattedCep;
                    },
                'contentOptions' => [
                    'style' => 'white-space: nowrap;'
                ],
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
            [
                'class' => ActionColumn::className(),
                'contentOptions' => [
                    'style' => 'text-align: center; white-space: nowrap; letter-spacing: 5px;'
                ],
                'urlCreator' => function ($action, Funcionario $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                 
            ],
        ],
    ]); ?>


</div>
