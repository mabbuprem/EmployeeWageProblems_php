<?php

class MultipleCompanies
{
    public $companyList = [];
    public $maxWorkingDays;
    public $maxWorkingHours;
    public $wagePerHour;
    public $companyName;
    public $array3 = [];

    //adding multiple companies using for loop and storing the comapny list and wage in array
    function companyArray()
    {
        $emp1 = new EmployeeWage("CYIENT", 25, 26, 100);
        $emp2 = new EmployeeWage("IBM", 30, 26, 80);
        $emp3 = new EmployeeWage("TCS", 20, 24, 120);
        $companyList = [$emp1, $emp2, $emp3];
        for ($i = 0; $i < count($companyList); $i++) {
            $companyList[$i]->empArray();
            echo "\n";
              //$array3[$companyList[$i]] = $value;
        }

         //foreach($array3 as $companyList[$i]=>$value){
            // var_dump($companyList[$i],$value);
        // }

    }
}

?>