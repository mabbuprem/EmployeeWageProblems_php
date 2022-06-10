<?php

class EmployeeWage
{
    public $WAGE_PER_HR = 20;
    public $FULL_TIME_WORKING_HRS = 8;
    public $PART_TIME_WORKING_HRS = 4;
    public $WORKING_DAYS_PER_MONTH = 20;
    public $WORKING_HOURS_PER_MONTH = 100;
    public $COUNT_FULL_TIME=0;
    public $COUNT_PART_TIME=0;
    public $COUNT_ABSENT=0;

    public $workingHrs = 0;
    public $monthlyWage = 0;
    public $totalWorkingDays = 0;
    public $totalWorkingHours = 0;

    /**
     * Function to Check Employee is Present or Absent
     * Returns working hrs
     */
    function empAttendance()
    {
        $empCheck = rand(0, 2);
        switch ($empCheck) {
            case 1:
                $this->COUNT_PART_TIME++;
                return $this->PART_TIME_WORKING_HRS;
                break;

            case 2:
                $this->COUNT_FULL_TIME++;
                return $this->FULL_TIME_WORKING_HRS;
                break;

            default:
                $this->COUNT_ABSENT++;
                return 0;
                break;
        }
    }

    /**
     * Function to Calculate Daily Wage
     * Printing the daily wage to the output
     * Calling attendance function to check employee attendance
     * returns daily wage of the employee
     */
    function dailyWage()
    {
        $hrs = $this->empAttendance();
        $this->workingHrs = $hrs;
        $dailyWage = $this->WAGE_PER_HR * $hrs;
        return $dailyWage;
    }

    /**
     * Function to Calculate Monthly Wage
     * Printing the Monthly wage to the output
     * Calling daily wage function to get daily wage
     */
    function monthlyWage()
    {
        while (
            $this->totalWorkingHours <= $this->WORKING_HOURS_PER_MONTH-4 ||
            $this->totalWorkingDays < $this->WORKING_DAYS_PER_MONTH
        ) {
            $this->totalWorkingDays++;
            $dailyWage = $this->dailyWage();

            $this->monthlyWage += $dailyWage;
            $this->totalWorkingHours += $this->workingHrs;
        }

        echo "Total Working Days:: " . $this->COUNT_FULL_TIME + $this->COUNT_PART_TIME . "\n";
        echo "Total Working Hours:: " . $this->totalWorkingHours . "\n";
        echo "Monthly Wage:: " . $this->monthlyWage . "\n";
        echo "Days Employee was full time in month: " . $this->COUNT_FULL_TIME . "\n";
        echo "Days Employee was Part time in month: " . $this->COUNT_PART_TIME . "\n";
        echo "Days Employee was Absent in month: " . $this->COUNT_ABSENT . "\n";
    }
}
$employeeWage = new EmployeeWage();
$employeeWage->monthlyWage();