<?php

include "IEmployeeWage.php";
include "CompanyLists.php";

class EmployeeWage implements IEmployeeWage
{

    const IS_PRESENT = 1;
    const IS_PARTTIME = 2;
    const FULL_TIME_HOURS = 8;
    const PART_TIME_HOURS = 4;

    public $maxWorkingDays = 0;
    public $maxWorkingHours = 0;
    public $wagePerHour = 0;
    public $totalWorkingHours = 0;
    public $workingDays = 1;
    public $monthlyWage = 0;
    public $workingHours = 0;
    public $array = [];
    public $array1 = [];
    public $companyName;
    public $dailyWage = 0;
    public $companyArray = [];
    static function welcomeMsg()
    {
        echo "---------Welcome to Employee Wage builder------------\n";
    }



    public function __construct($companyName, $wagePerHour, $maxWorkingDays, $maxWorkingHours)
    {

        $this->companyName = $companyName;
        $this->maxWorkingDays = $maxWorkingDays;
        $this->maxWorkingHours = $maxWorkingHours;
        $this->wagePerHour = $wagePerHour;
        $this->companyArray = [$this->companyName, $this->wagePerHour, $this->maxWorkingDays, $this->maxWorkingHours];
    }

    //function to check employee attendence
    function attendenceCheck()
    {
        $random = rand(0, 3);                   //random value to check attendence
        switch ($random) {                       //switch case condition
            case 1:
                // echo "Employee is Present\n";
                $this->workingHours = EmployeeWage::FULL_TIME_HOURS;
                break;
            case 2:
                // echo "Employee is PartTime\n";
                $this->workingHours = EmployeeWage::PART_TIME_HOURS;
                break;
            default:
                // echo "Employee is Absent\n";
                $this->workingHours = 0;            //updated values in UC8
        }
        $this->dailyWage = $this->workingHours * $this->wagePerHour;
        //   echo "The daily wage of the employee is : " . $this->dailyWage . "\n";
    }

    //function to store daily wage along with total wage
    function printArray()
    {
        //Printing values from the array 
        foreach ($this->array as $this->workingDays => $this->dailyWage) {
            echo "[Day" . $this->workingDays . "] => Rs." . $this->dailyWage . " \n";
        }
        echo "Total monthly wage for the employee is : Rs. " . $this->monthlyWage . "\n";
    }

    //function to calculate employee wage
    function calculateEmployeeWage()
    {
        // condition for maxworkingday and Max working hour
        while ($this->workingDays < $this->maxWorkingDays && $this->totalWorkingHours < $this->maxWorkingHours) {
            // echo "Day " . $this->workingDays . "\n";
            EmployeeWage::attendenceCheck();            //calling employee attendance function
            //calculating total working hours    
            $this->workingDays++;
            $this->totalWorkingHours = $this->totalWorkingHours + $this->workingHours;            //Adding hours in loop
            //  echo $totalWorkingHours." Hours";
            $this->array[$this->workingDays] = $this->dailyWage;              //storing working days and total working hours in associative array
        }
        // $this->printArray();
        // foreach ($this->array as $this->workingDays => $this->dailyWage) {
        //     echo "[Day" . $this->workingDays . "] => Rs." . $this->dailyWage . " \n";
        // }
    }

    //function to print employee wage
    function printEmployeeWage()
    {
        //echo "Employee Wage for " . $this->companyName . "\n";
        EmployeeWage::calculateEmployeeWage();      //calling function to calculate employee wage
        //calculation of EmployeeWage
        // echo "Total working Hours = " . $this->totalWorkingHours . "\n";
        $this->monthlyWage = $this->totalWorkingHours * $this->wagePerHour;
        //echo "Employee total monthly wage is : $" . $this->monthlyWage . "\n";
        //  EmployeeWage::printArray();         //calling function to print array values
    }

    public function empArray()
    {

        $this->array1[$this->companyName] = $this->companyArray;
        foreach ($this->array1 as $this->companyName => $this->companyArray) {
            EmployeeWage::printEmployeeWage();
            $this->array[$this->workingDays] = $this->dailyWage;              //storing working days and total working hours in associative array
            echo "[ " . $this->companyName . "[ \n";
            foreach ($this->array as $this->workingDays => $this->dailyWage) {
                echo "[Day" . $this->workingDays . "] => Rs." . $this->dailyWage . " \n";
            }
            echo "Total monthly wage: Rs. " . $this->monthlyWage . " ]";
        }
    }
     function dailyWage(){
         $this->dailyWage = $this->workingHours * $this->wagePerHour;
         echo "The daily wage of the employee is : ".$this->dailyWage();
     }

}

$empWage = new MultipleCompanies();
$empWage->companyArray();

?>



