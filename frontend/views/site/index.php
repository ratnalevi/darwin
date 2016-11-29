<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <?php
    $form = ActiveForm::begin([
        'id' => 'active-form',
        'options' => [
            'class' => 'form-horizontal',
            'enctype' => 'multipart/form-data'
        ],
    ]);



    echo Html::submitButton('Submit', ['class'=> 'btn btn-primary']);

    ActiveForm::end();
?>

</div>
