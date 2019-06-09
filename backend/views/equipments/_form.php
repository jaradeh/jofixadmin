<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Equipments */
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
                <?= $form->field($model, 'status')->textInput()->dropDownList([1 => 'Active', 2 => 'In-active']) ?>
            </div>
        </div>
        


        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>