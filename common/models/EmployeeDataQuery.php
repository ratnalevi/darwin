<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[EmployeeData]].
 *
 * @see EmployeeData
 */
class EmployeeDataQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EmployeeData[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EmployeeData|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
