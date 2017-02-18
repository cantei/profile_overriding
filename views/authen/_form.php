<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\datetime\DateTimePicker
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>





   
     <div class="row"> 
        <div class="col-md-4">
            <?php
            echo $form->field($model, 'confirmed_at')->widget(DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter event time ...'],
	'pluginOptions' => [
		'autoclose' => true
	]
]);
            ?> 
        </div>
    </div>
        <?= $form->field($model, 'blocked_at')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
