<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\Clients;
use backend\models\Services;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RequestsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="has-sidebar-left">
    <div class="sticky">
        <div class="navbar navbar-expand navbar-dark d-flex justify-content-between bd-navbar blue accent-3">
            <div class="relative">
                <a href="#" data-toggle="push-menu" class="paper-nav-toggle pp-nav-toggle">
                    <i></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="page  has-sidebar-left height-full">
    <header class="blue accent-3 relative">
        <div class="container-fluid text-white">
            <div class="row p-t-b-10 ">
                <div class="col">
                    <h4>
                        <i class="icon-package"></i>
                        <?php echo $this->title ?>
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link active" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all"
                           role="tab" aria-controls="v-pills-all"><i class="icon icon-home2"></i><?php echo $this->title ?></a>
                    </li>
                    <li>
                        <a class="nav-link" id="v-pills-buyers-tab" href="<?php echo "/backend/web/" . $this->title . "/create" ?>" role="tab"
                           aria-controls="v-pills-buyers"><i class="icon icon-add"></i> Create <?php echo $this->title ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container-fluid animatedParent ">
        <div class="tab-content my-3" id="v-pills-tabContent">
            <div class="tab-pane animated fadeInUpShort show active" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab">
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card r-0 shadow">
                            <div class="table-responsive">

                                <?=
                                GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'filterModel' => $searchModel,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
//                                        'id',
                                        [
                                            'attribute' => 'phone',
                                            'format' => 'html',
                                            'value' => function ($model) {
                                                return "<a href='tel:" . $model->phone . "'>" . $model->phone . "</a>";
                                            },
                                        ],
//                                        'quotation_id',
                                        [
                                            'attribute' => 'service_id',
                                            'format' => 'html',
                                            'value' => function ($model) {
                                                $getService = Services::find()->where(['id' => $model->service_id])->one();
                                                return "<a href='/backend/web/services/" . $getService->id . "'>" . $getService->name . "</a>";
                                            },
                                        ],
                                        [
                                            'attribute' => 'status',
                                            'format' => 'html',
                                            'value' => function ($model) {
                                                if ($model->status == 1) {
                                                    return "<i class='fa fa-exclamation-triangle text-warning'></i> Pending";
                                                } else if ($model->status == 2) {
                                                    return "<i class='fa fa-check text-primary'></i> Accepted";
                                                } else if ($model->status == 3) {
                                                    return "<i class='fa fa-check text-success'></i> Arrived";
                                                } else if ($model->status == 4) {
                                                    return "<i class='fa fa-check text-success'></i> Finished";
                                                } else if ($model->status == 5) {
                                                    return "<i class='fa fa-times text-danger'></i> Cancelled";
                                                }
                                            },
                                        ],
                                        // 'type',
                                        [
                                            'attribute' => 'date_created',
                                            'format' => 'html',
                                            'value' => function ($model) {
                                                return date('Y-m-d H:i:s A', $model->date_created);
                                            },
                                        ],
                                        // 'date_edited',
                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'template' => '{view} {update} {delete}',
                                            'buttons' => [
                                                'view' => function ($url, $model, $key) {

                                                    return Html::a('', $url, ['class' => 'icon-eye']);
                                                },
                                                'update' => function ($url, $model, $key) {

                                                    return Html::a('', $url, ['class' => 'icon-edit']);
                                                },
                                                'delete' => function ($url, $model, $key) {

                                                    return Html::a('', $url, ['data-confirm' => 'Are you sure you want to delete this item?', 'class' => 'icon-trash']);
                                                }
                                            ]
                                        ],
                                    ],
                                ]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Add New Message Fab Button-->
    <a href="<?php echo "/backend/web/" . $this->title . "/create" ?>" class="btn-fab btn-fab-md fab-right fab-right-bottom-fixed shadow btn-primary"><i class="icon-add"></i></a>
</div>