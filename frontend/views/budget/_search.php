<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BudgetSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="budget-search">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'action' => ['budget'],
        'method' => 'post',
        'enableClientValidation' => true,
    ]);
    ?>

    <?= $form->field($model, 'junior_dev') ?>

    <?= $form->field($model, 'senior_dev') ?>

    <?= $form->field($model, 'budget') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary budget-fetch-search']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
