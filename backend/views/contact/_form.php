<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Contact */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card  shadow no-b r-0">
    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>


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
                <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'date')->textInput() ?>
            </div>
        </div>


        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>