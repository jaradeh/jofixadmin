<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card  shadow no-b r-0">
    <div class="card-body">      
        
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'username') ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'email') ?>
            </div>
        </div>
        <div class="form-group form-float">
            <div class="form-line">
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>
        </div>
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>