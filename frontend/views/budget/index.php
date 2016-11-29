<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BudgetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Budgets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budget-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <style type="text/css">
        .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;margin:0px auto;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:15px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:15px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
        .tg .tg-fqys{background-color:#333333;color:#ffffff;vertical-align:top}
        .tg .tg-b7b8{background-color:#f9f9f9;vertical-align:top}
        th.tg-sort-header::-moz-selection { background:transparent; }th.tg-sort-header::selection      { background:transparent; }th.tg-sort-header { cursor:pointer; }table th.tg-sort-header:after {  content:'';  float:right;  margin-top:7px;  border-width:0 4px 4px;  border-style:solid;  border-color:#404040 transparent;  visibility:hidden;  }table th.tg-sort-header:hover:after {  visibility:visible;  }table th.tg-sort-desc:after,table th.tg-sort-asc:after,table th.tg-sort-asc:hover:after {  visibility:visible;  opacity:0.4;  }table th.tg-sort-desc:after {  border-bottom:none;  border-width:4px 4px 0;  }@media screen and (max-width: 767px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}
    </style>

    <div id="success-div" style="display: none">
        <h3>Best fit team for the given parameters</h3>

        <h4>Junior Developers</h4>
        <div class="tg-wrap">
            <table id="junior_list" class="tg">
                <tr>
                    <th class="tg-fqys">ID</th>
                    <th class="tg-fqys">Name</th>
                    <th class="tg-fqys">Level</th>
                    <th class="tg-fqys">Experience</th>
                    <th class="tg-fqys">Salary per month Rs.</th>
                </tr>
            </table>
        </div>

        <br>
        <br>
        <br>

        <h4>Senior Developers</h4>

        <div class="tg-wrap">
            <table id="senior_list" class="tg">
                <tr>
                    <th class="tg-fqys">ID</th>
                    <th class="tg-fqys">Name</th>
                    <th class="tg-fqys">Level</th>
                    <th class="tg-fqys">Experience</th>
                    <th class="tg-fqys">Salary per month Rs.</th>
                </tr>
            </table>
        </div>
    </div>

    <div id="empty-div" style="display: none">
        <h2>No team fits your requirement</h2>
    </div>
</div>
