<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServiceAnswersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Service Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-answers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Service Answers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'request_id',
            'answer_id',
            'date_created',
            'date_edited',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
