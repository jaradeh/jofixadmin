<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ServiceAnswers */

$this->title = 'Create Service Answers';
$this->params['breadcrumbs'][] = ['label' => 'Service Answers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-answers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
