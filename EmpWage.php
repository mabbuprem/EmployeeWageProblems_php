<?php

class Employee_Wage
{
    public const WAGE_PER_HR = 20;
    public const FULL_TIME_WORKING_HRS = 8;
    public const PART_TIME_WORKING_HRS = 4;
    public const IS_FULL_TIME = 2;
    public const IS_PART_TIME = 1;
    public const IS_ABSENT = 0;
    public const WORKING_DAYS_PER_MONTH = 20;
    public const WORKING_HOURS_PER_MONTH = 100;

    public $workingHrs = 0;
    public $monthlyWage = 0;
    public $totalWorkingDays = 0;
    public $totalWorkingHours = 0;

    /**
     * Function to Check Employee is Present or Absent
     * Returns working hrs
     * Non-Parameterized Function
     */
    function attendance()
    {
        $empCheck = rand(0, 2);
        switch ($empCheck) {
            case $this->IS_PART_TIME:
                echo "Part Time Employee\n";
                return $this->PART_TIME_WORKING_HRS;
                break;

            case $this->IS_FILL_TIME:
                echo "Full Time Employee\n";
                return $this->FULL_TIME_WORKING_HRS;
                break;

            default:
                echo "Employee is Absent\n";
                return 0;
                break;
        }
    }

    /**
     * Function to Calculate Daily Wage
     * Non-Parameterized Function
     * Printing the daily wage to the output
     * Calling attendance function to check employee attendance
     * returns daily wage of the employee
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
            $dailyWage = $this->dailyWage();
            $this->monthlyWage += $dailyWage;
            $this->totalWorkingHours += $this->workingHrs;
        }

        echo "Total Working Days:: " . $this->totalWorkingDays . "\n";
        echo "Total Working Hours:: " . $this->totalWorkingHours . "\n";
        echo "Monthly Wage:: " . $this->monthlyWage . "\n\n";
    }
}
$employeeWage = new Employee_Wage();
$employeeWage->monthlyWage();