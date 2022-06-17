<?php

class CompanyEmpWage
{
    /**
     * Function for multiple companies and 
     * storing name and total wage into arrays
     * Printing the array
     */
    public function numOfCompanies()
    {
        $name = array();
        $totalWage = array();
        $n = readline("Number of Companies: ");
        for ($i = 0; $i < $n; $i++) {
            $name[$i] = readline('Enter Name of Company: ');
            $wage = readline('Enter Employee Wage Per Hour: ');
            $days = readline('Enter Maximum working days per month: ');
            $hours = readline('Enter Maximum working hours per month: ');
            echo "Employee Wage Computation For\n";
            echo "***** " . $name[$i] . " *****\n";
            $employeeWage = new Employee_Wage($wage, $days, $hours);
            $totalWage[$i] = $employeeWage->monthlyWage();
        }
        for ($i = 0; $i < $n; $i++) {
            echo "\nName of Company:: " . $name[$i];
            echo "\nTotal Salary:: " . $totalWage[$i];
        }
    }
}