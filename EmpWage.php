<?php

class EmployeeWage
{

    /**
     * Function to Check Employee is Present or Absent
     * Using rand() to generate the random of 0 or 1
     */
    function empAttendance()
    {
        $random = rand(0, 1);
        if ($random == 1) {
            echo "Employee is Present";
        } else {
            echo "Employee is Absent";
        }
    }
}

$emp = new EmployeeWage();
$emp->empAttendance();