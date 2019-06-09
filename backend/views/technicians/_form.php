<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Services;

/* @var $this yii\web\View */
/* @var $model backend\models\Technicians */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card  shadow no-b r-0">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h5><i class="icon fa fa-check"></i> Successfully Sent !</h5>
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <h5><i class="icon fa fa-warning"></i> Fail !</h5>
            <?= Yii::$app->session->getFlash('error') ?>
        </div>
    <?php endif; ?>
    <div class="card-body">
        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'phone')->textInput() ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'experience')->textInput() ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'profession[]')->dropDownList(ArrayHelper::map(Services::find()->all(), 'id', 'name'),['multiple'=>'multiple',]) ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'description')->textInput() ?>
                <?= $form->field($model, 'date_created')->hiddenInput(['value'=>time()])->label(false) ?>
                <?= $form->field($model, 'date_edited')->hiddenInput(['value'=>time()])->label(false) ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'image')->fileInput(['id' => 'upload_make_path_admin', 'multiple' => FALSE, 'accept' => 'image/*']) ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'status')->textInput()->dropDownList([1 => 'Active', 2 => 'In-active']) ?>
            </div>
        </div>



        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
