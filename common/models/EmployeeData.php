<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employee_data".
 *
 * @property integer $id
 * @property string $emp_name
 * @property integer $emp_exp
 * @property integer $emp_salary
 */
class EmployeeData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employee_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['emp_name'], 'required'],
            [['emp_exp', 'emp_salary'], 'integer'],
            [['emp_name'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'emp_name' => 'Emp Name',
            'emp_exp' => 'Emp Exp',
            'emp_salary' => 'Emp Salary',
        ];
    }

    /**
     * @inheritdoc
     * @return EmployeeDataQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmployeeDataQuery(get_called_class());
    }
}
