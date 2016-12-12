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
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class EmployeeData extends \yii\db\ActiveRecord
{
    const EMPLOYEE_ACTIVE = 10;
    const EMPLOYEE_INACTIVE = -10;
    const EMPLOYEE_NEW = 0;
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
            [['emp_name', 'created_at', 'updated_at'], 'required'],
            [['emp_exp', 'emp_salary', 'status', 'created_at', 'updated_at'], 'integer'],
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
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
