<?php

namespace frontend\controllers;

use app\models\Budget;
use common\models\EmployeeData;
use frontend\models\BudgetSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;


/**
 * BudgetController implements the CRUD actions for Budget model.
 */
class BudgetController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Budget models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BudgetSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Budget model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Budget the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Budget::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionBudget(){

        $model = new BudgetSearch();
        $model->load( Yii::$app->request->post() );
        if (Yii::$app->request->isAjax ) {

            // the main logic should come here
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

            $seniorDev = EmployeeData::find()->andWhere(['>', 'emp_exp', 3 ])->limit(5)->all();
            $response = [
                'senior' => [

                ],
                'junior' => [

                ],
            ];

            foreach( $seniorDev as $dev ){
                $response['senior'][] = [
                    'id' => $dev->id,
                    'name' => $dev->emp_name,
                    'exp' => $dev->emp_exp,
                    'salary' => $dev->emp_salary,
                ];
            }
            $juniorDev = EmployeeData::find()->andWhere(['<=', 'emp_exp', 3 ])->limit(5)->all();
            foreach( $juniorDev as $dev ){
                $response['junior'][] = [
                    'id' => $dev->id,
                    'name' => $dev->emp_name,
                    'exp' => $dev->emp_exp,
                    'salary' => $dev->emp_salary,
                ];
            }

            return $response;
        }
    }
}
