<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EmployeeData */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employee-data-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'emp_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emp_exp')->textInput() ?>

    <?= $form->field($model, 'emp_salary')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
