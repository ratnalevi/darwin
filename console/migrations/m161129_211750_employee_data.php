<?php

use yii\db\Migration;

class m161129_211750_employee_data extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%employee_data}}', [
            'id' => $this->primaryKey(),
            'emp_name' => $this->string(64)->notNull(),
            'emp_exp' => $this->integer(4)->notNull(),
            'emp_salary' => $this->integer(12)->notNull(),
            'status' => $this->smallInteger(2)->defaultValue(10),
            'created_at' => $this->timestamp()->notNull(),
            'updated_at' => $this->timestamp()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%employee_data}}');
    }

}
