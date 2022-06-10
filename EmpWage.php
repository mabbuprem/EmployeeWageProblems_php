<?php

class EmployeeWage
{
    public $WAGE_PER_HR = 20;
    public $FULL_TIME_WORKING_HRS = 8;

    /**
     * Function to Check Employee is Present or Absent
     * Using rand() to generate the random of 0 or 1
     */
    function empAttendance()
    {
        $random = rand(0, 1);
        if ($random == 1) {
            echo "Employee is Present \n";
            return $this->FULL_TIME_WORKING_HRS;
        } else {
            echo "Employee is Absent\n";
            return 0;
        }
    }

    /**
     * Function to Calculate Daily Wage of
     * employee if he/she is present.
     */
    function dailyWage()
    {
        $hrs = $this->empAttendance();
        $dailyWage = $this->WAGE_PER_HR * $hrs;
        echo "Daily Wage of Employee: " . $dailyWage;
    }
}

$emp = new EmployeeWage();
$emp->dailyWage();