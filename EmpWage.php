<?php

include "Employee_Wage_Interface.php";
include "Company_Employee_Wage.php";

class Employee_Wage implements computeEmpWage
{
    public const FULL_TIME_WORKING_HRS = 8;
    public const PART_TIME_WORKING_HRS = 4;
    public const IS_FILL_TIME = 2;
    public const IS_PART_TIME = 1;
    public const IS_ABSENT = 0;

    public $WAGE_PER_HR;
    public $WORKING_DAYS_PER_MONTH;
    public $WORKING_HOURS_PER_MONTH;

    public $workingHrs = 0;
    public $monthlyWage = 0;
    public $totalWorkingDays = 0;
    public $totalWorkingHours = 0;

    public function __construct($wage, $days, $hours)
    {
        $this->WAGE_PER_HR = $wage;
        $this->WORKING_DAYS_PER_MONTH = $days;
        $this->WORKING_HOURS_PER_MONTH = $hours;
    }
    /**
     * Function to Check Employee is Present or Absent
     * Returns working hrs
     * Non-Parameterized Function
     */
    function attendance()
    {
        $empCheck = rand(0, 2);
        switch ($empCheck) {
            case Employee_Wage:: IS_PART_TIME:
                echo "Part Time Employee\n";
                return Employee_Wage:: PART_TIME_WORKING_HRS;
                break;

            case Employee_Wage:: IS_FILL_TIME:
                echo "Full Time Employee\n";
                return Employee_Wage:: FULL_TIME_WORKING_HRS;
                break;

            default:
                echo "Employee is Absent\n";
                return 0;
                break;
        }
    }

    /**
     * Function to Calculate Daily Wage
     * Printing the daily wage to the output
     * Calling attendance function to check employee attendance
     * @return int daily wage of the employee
     */
    function dailyWage()
    {
        $this->workingHrs = $this->attendance();
        $dailyWage = $this->WAGE_PER_HR * $this->workingHrs;
        echo "Working Hours:: " . $this->workingHrs . "\n";
        echo "Daily Wage:: " . $dailyWage . "\n\n";
        return $dailyWage;
    }

    /**
     * Function to Calculate Monthly Wage
     * Non-Parameterized Function
     * Printing the Monthly wage to the output
     * Calling daily wage function to get daily wage
     */
    function monthlyWage()
    {
        while (
            $this->totalWorkingHours <= $this->WORKING_HOURS_PER_MONTH &&
            $this->totalWorkingDays < $this->WORKING_DAYS_PER_MONTH
        ) {
            $this->totalWorkingDays++;
            echo "Day:: " . $this->totalWorkingDays . "\n";
            $dailyWage = $this->dailyWage($this->WAGE_PER_HR);
            $this->monthlyWage += $dailyWage;
            $this->totalWorkingHours += $this->workingHrs;
        }

        echo "Total Working Days:: " . $this->totalWorkingDays . "\n";
        echo "Total Working Hours:: " . $this->totalWorkingHours . "\n";
        echo "Monthly Wage:: " . $this->monthlyWage . "\n\n";
        return $this->monthlyWage;
    }
}
$companyEmpWage = new CompanyEmpWage();
$companyEmpWage->numOfCompanies();