<?php

/**
 * Interface to declare the functions to be implemented
 * inside the employee wage class
 */
interface computeEmpWage
{
    public function attendance();
    public function dailyWage();
    public function monthlyWage();
}