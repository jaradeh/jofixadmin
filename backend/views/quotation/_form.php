<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Quotation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group field-quotation-price required">
        <div class="row">
            <div class="col-sm-5">
                <label class="control-label" for="quotation-description">Description</label>
                <input type="text" id="quotation-description" class="form-control" name="AssignedQuotation[1][description]" aria-required="true">
            </div>
            <div class="col-sm-1">
                <label class="control-label" for="quotation-quantity">QTY</label>
                <input type="number" id="qty_1" class="form-control getQuantity" name="AssignedQuotation[1][quantity]" value="0" aria-required="true">
            </div>
            <div class="col-sm-1">
                <label class="control-label" for="quotation-unit">Unit</label>
                <input type="text" id="quotation-unit" class="form-control" name="AssignedQuotation[1][unit]"  aria-required="true">
            </div>
            <div class="col-sm-2">
                <label class="control-label" for="quotation-unit-price">Unit Price</label>
                <input type="number" id="1" class="form-control getPrice" name="AssignedQuotation[1][unit-price]" step="0.01" aria-required="true">
            </div>
            <div class="col-sm-3">
                <label class="control-label" for="quotation-total">Total</label>
                <input type="number" id="quotation-total_1" class="form-control calculateAllPrices" readonly="" name="AssignedQuotation[1][total]" aria-required="true">
            </div>

            <div class="col-sm-12 no_padding" id="addAssignedQoutationHere"></div>
            <div class="col-sm-12">
                <br />
                <span class="text-primary addAssignedQoutation"><i class="fa fa-plus"></i> ADD</span>
                <span class="text-danger removeAssignedQoutation"><i class="fa fa-trash"></i> DELETE</span>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6">
            <label class="control-label" for="quotation-sum">Sub Total</label>
            <input type="number" id="quotation-sum" class="form-control" name="Quotation[sum]" value="0" readonly="" aria-required="true">
            <div class="help-block"></div>
        </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-6">
                    <?= $form->field($model, 'vat')->textInput(['name' => 'total-vat', 'id' => 'quotation-vat', 'value' => '16'])->label('VAT Percentage') ?>
                </div>
                <div class="col-sm-6">
                    <label class="control-label" for="quotation-total-vat">Total VAT</label>
                    <input type="number" id="quotation-total-vat" class="form-control" readonly="" name="Quotation[vat]" aria-required="true">
                    <div class="help-block"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-6">
            <?= $form->field($model, 'price')->textInput(['readonly' => true, 'value' => 0])->label('Total Amount') ?>
        </div>
        <div class="col-sm-6"></div>
        <div class="col-sm-6">
            <div class="btn btn-primary" id="calculateQoutationTotal"> Calculate</div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
