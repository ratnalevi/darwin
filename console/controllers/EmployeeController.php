<?php

namespace console\controllers;

use common\models\EmployeeData;
use \Faker\Factory;
use yii\console\Controller;

class EmployeeController extends  Controller   {

    const JUNIOR = '0';
    const SENIOR = '1';

    // Junior dev salary 10000 - 50000
    // Senior dev salary 40000 - 200000

    public $salaryRange = [
        [ 10000, 20000 ],
        [ 20001, 30000 ],
        [ 30001, 40000 ],
        [ 40001, 50000 ],
        [ 40000, 60000 ],
        [ 60001, 80000 ],
        [ 80001, 100000 ],
        [ 100001, 130000 ],
        [ 130001, 150000 ],
        [ 150001, 170000 ],
        [ 170001, 200000 ]
    ];

    public $juniorExp = [ 0, 3 ];
    public $seniorExp = [ 4, 10 ];

    public function actionLoadData(){
        $faker = Factory::create();

        do {
            $empCount = intval( readline('Number of employees required ( Only integer ): ') );
        }
        while( !ctype_alnum( $empCount ) && intval( $empCount ) <= 0 );

        print "Number of employees required : $empCount \n";

        do {
            $isDelete = strtolower( readline('You want to delete previous entries (yes|no):  ') );
        }while( $isDelete !== 'yes' && $isDelete !== 'no' );

        if( $isDelete === 'yes' ){
            print "Deleting all old records\n";
            EmployeeData::deleteAll();
        }

        $seniorDev = 0;
        $juniorDev = 0;

        for( $i = 0; $i < $empCount; $i++ ) {

            $empType = round( rand(0, 100) / 10 );
            if( $empType < 4 ){
                $empType = $this::JUNIOR;
            }else{
                $empType = $this::SENIOR;
            }

            if( $empType == $this::SENIOR ){
                $exp = $faker->numberBetween( $this->seniorExp[0], $this->seniorExp[1] );
                $seniorDev++;
            }elseif( $empType == $this::JUNIOR ){
                $exp = $faker->numberBetween( $this->juniorExp[0], $this->juniorExp[1] );
                $juniorDev++;
            }else {
                continue;
            }

            $employee = new EmployeeData();
            $employee->emp_name = $faker->name;
            $employee->emp_salary = intval( round( rand( $this->salaryRange[ $exp ][0], $this->salaryRange[ $exp ][1] ) / 1000 ) ) * 1000;
            $employee->emp_exp = $exp;
            $employee->status = EmployeeData::EMPLOYEE_ACTIVE;
            $employee->created_at = time();
            $employee->updated_at = time();

            if( !$employee->save() ){
                var_dump($employee->errors );
            }
        }

        print "Summary of script\n";
        print "\tJunior Developers : $juniorDev\n";
        print "\tSenior Developers : $seniorDev\n";

    }
}