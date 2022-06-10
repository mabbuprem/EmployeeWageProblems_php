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
     * Function to Check Employee is Present or Absent,
     * returns working hrs
     */
    function empAttendance()
    {
        $empCheck = rand(0, 2);
        switch ($empCheck) {
            case 1:
                echo "Part Time Employee\n";
                return $this->PART_TIME_WORKING_HRS;
                break;

            case 2:
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