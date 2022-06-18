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
        $n = readline("Number of Companies: ");
        for ($i = 0; $i < $n; $i++) {
            $name = readline('Enter Name of Company: ');
            $wage = readline('Enter Employee Wage Per Hour: ');
            $days = readline('Enter Maximum working days per month: ');
            $hours = readline('Enter Maximum working hours per month: ');
            echo "Employee Wage Computation For\n";
            echo "***** " . $name . " *****\n";
            $employeeWage = new Employee_Wage($name, $wage, $days, $hours);
            $employeeWage->monthlyWage();
            if ($i == ($n - 1)) {
                $employeeWage->getTotalWage();
            }
        }
    }
}