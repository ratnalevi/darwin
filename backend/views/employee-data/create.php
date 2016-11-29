<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EmployeeData */

$this->title = 'Create Employee Data';
$this->params['breadcrumbs'][] = ['label' => 'Employee Datas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employee-data-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
