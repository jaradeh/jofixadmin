<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Services;

/* @var $this yii\web\View */
/* @var $model backend\models\Questions */

$this->title = 'questions';
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
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
                        <i class="icon fa fa-list"></i>
                        <?php echo $this->title ?>
                    </h4>
                </div>
            </div>
            <div class="row justify-content-between">
                <ul class="nav nav-material nav-material-white responsive-tab" id="v-pills-tab" role="tablist">
                    <li>
                        <a class="nav-link" href="/backend/web/<?php echo $this->title ?>" role="tab" aria-controls="v-pills-all"><i class="icon icon-home2">
                            </i><?php echo $this->title ?>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link active" id="v-pills-buyers-tab" href="#" role="tab" aria-controls="v-pills-buyers">
                            <i class="icon icon-eye"></i>  <?php echo $this->title ?>
                        </a>
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
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?=
                        Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ])
                        ?>
                        <br />
                        <br />
                        <div class="card r-0 shadow">
                            <div class="table-responsive">
                                <?=
                                DetailView::widget([
                                    'model' => $model,
                                    'attributes' => [
                                        'id',
                                        'title',
                                        [
                                            'attribute' => 'service_id',
                                            'format' => 'html',
                                            'value' => function ($model) {
                                                $getService = Services::find()->where(['id' => $model->service_id])->one();
                                                return "<a href='/backend/web/services/" . $getService->id . "'>" . $getService->name . "</a>";
                                            },
                                        ],
                                        [
                                            'attribute' => 'date_created',
                                            'format' => 'html',
                                            'value' => function ($model) {
                                                return date('Y-m-d H:i:s A', $model->date_created);
                                            },
                                        ],
                                        [
                                            'attribute' => 'date_edited',
                                            'format' => 'html',
                                            'value' => function ($model) {
                                                return date('Y-m-d H:i:s A', $model->date_edited);
                                            },
                                        ],
                                    ],
                                ])
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