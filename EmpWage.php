<?php

class EmployeeWage
{
    public $WAGE_PER_HR = 20;
    public $FULL_TIME_WORKING_HRS = 8;
    public $PART_TIME_WORKING_HRS = 4;
    public $IS_FULL_TIME = 2;
    public $IS_PART_TIME = 1;
    public $IS_ABSENT = 0;
    public $MONTHLY_WORKING_DAYS = 20; 
    public $COUNT_FULL_TIME=0;
    public $COUNT_PART_TIME=0;
    public $COUNT_ABSENT=0;

    /**
     * Function to Check Employee is Present or Absent,
     * returns working hrs
     */
    function empAttendance()
    {
        $empCheck = rand(0, 2);
        switch ($empCheck) {
            case 1:
                ++$this->COUNT_PART_TIME;
                return $this->PART_TIME_WORKING_HRS;
                break;

            case 2:
                ++$this->COUNT_FULL_TIME;
                return $this->FULL_TIME_WORKING_HRS;
                break;

            default:
                ++$this->COUNT_ABSENT;
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
        $count = 1;
        $hrs = $this->empAttendance();
        $dailyWage = $this->WAGE_PER_HR * $hrs;
        return $dailyWage;
    }

    function monthlyWage(){
        $monthlyWage=0;
        for($i=1;$i<=$this->MONTHLY_WORKING_DAYS;$i++){
            $dailyWage = $this->dailyWage();
            $monthlyWage += $dailyWage;
        }
        echo "Days Employee was full time in month: " . $this->COUNT_FULL_TIME . "\n";
        echo "Days Employee was Part time in month: " . $this->COUNT_PART_TIME . "\n";
        echo "Days Employee was Absent in month: " . $this->COUNT_ABSENT . "\n";
        echo "Monthly Wage of Employee: " . $monthlyWage;
    }
}

$emp = new EmployeeWage();
$emp->monthlyWage();