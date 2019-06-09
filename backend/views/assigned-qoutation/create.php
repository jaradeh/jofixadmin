<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AssignedQoutation */

$this->title = 'Create Assigned Qoutation';
$this->params['breadcrumbs'][] = ['label' => 'Assigned Qoutations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assigned-qoutation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
