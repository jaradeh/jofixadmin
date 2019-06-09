<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Services;
use backend\models\Clients;
use backend\models\Quotation;
use backend\models\Technicians;

/* @var $this yii\web\View */
/* @var $model backend\models\Requests */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card  shadow no-b r-0">
    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'quotation_id')->dropDownList(ArrayHelper::map(Quotation::find()->all(), 'id', 'title')) ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'service_id')->dropDownList(ArrayHelper::map(Services::find()->all(), 'id', 'name')) ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'technician_id')->dropDownList(ArrayHelper::map(Technicians::find()->all(), 'id', 'name')) ?>
            </div>
        </div>


        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>