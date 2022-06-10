<?php

class EmployeeWage
{
    public $WAGE_PER_HR = 20;
    public $FULL_TIME_WORKING_HRS = 8;
    public $PART_TIME_WORKING_HRS = 4;
    public $IS_FULL_TIME = 2;
    public $IS_PART_TIME = 1;
    public $IS_ABSENT = 0;

    /**
     * Function to Check Employee is full time or parttime
     * Using rand() to generate the random of 0 to 2
     */
    function empAttendance()
    {
        $random = rand(0, 2);
        if ($random == $this->IS_PART_TIME) {
            echo "Part Time Employee\n";
            return $this->PART_TIME_WORKING_HRS;
        } elseif ($random == $this->IS_FULL_TIME) {
            echo "Full Time Employee\n";
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