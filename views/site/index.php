<?php

/** @var yii\web\View $this */

$this->title = 'Sistema RH';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Bem-vindo ao Sistema RH! 🏢</h1>

        <p class="lead">Gerencie seus cargos e funcionários de forma rápida e eficiente.</p>

        <p>
            <a class="btn btn-lg btn-success" href="<?= \yii\helpers\Url::to(['/funcionario/index']) ?>">
                Começar agora 🚀
            </a>
        </p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-6 text-center">
                <h2>Cargos 📋</h2>
                <p>Cadastre e organize as funções da sua empresa.</p>
                <p><a class="btn btn-outline-secondary" href="<?= \yii\helpers\Url::to(['/cargo/index']) ?>">Ir para Cargos &raquo;</a></p>
            </div>
            <div class="col-lg-6 text-center">
                <h2>Funcionários 👥</h2>
                <p>Mantenha os dados dos colaboradores sempre atualizados.</p>
                <p><a class="btn btn-outline-secondary" href="<?= \yii\helpers\Url::to(['/funcionario/index']) ?>">Ir para Funcionários &raquo;</a></p>
            </div>
        </div>
    </div>
</div>