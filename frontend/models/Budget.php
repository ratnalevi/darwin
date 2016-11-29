<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "budget".
 *
 * @property integer $junior_dev
 * @property integer $senior_dev
 * @property integer $budget
 */
class Budget extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'budget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['junior_dev', 'senior_dev', 'budget'], 'required'],
            [['junior_dev', 'senior_dev', 'budget'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'junior_dev' => 'Junior Dev',
            'senior_dev' => 'Senior Dev',
            'budget' => 'Budget',
        ];
    }

    /**
     * @inheritdoc
     * @return BudgetQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BudgetQuery(get_called_class());
    }
}
