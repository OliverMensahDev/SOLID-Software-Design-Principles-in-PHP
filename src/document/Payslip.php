<?php

namespace app\document;

use app\personnel\Employee;
use Exception;

class Payslip implements ExportableTXT
{
    private $employeeName;
    private $monthlyIncome;
    private $month;

    public function __construct(Employee $employee, $month)
    {
        $this->employeeName  = $employee->getFullName();
        $this->monthlyIncome = $employee->getMonthlyIncome();
        $this->month = $month;
    }

    public function getMonth()
    {
        return $this->month;
    }

    public function getMonthlyIncome()
    {
        return $this->monthlyIncome;
    }

    public function getEmployeeName()
    {
        return $this->employeeName;
    }

    public function toTxt()
    {
        $sb = "### EMPLOYEE PAYSLIP ####";
        $sb .= PHP_EOL;
        $sb .= "MONTH: " . $this->month;
        $sb .= PHP_EOL;
        $sb .= "NAME: " .  $this->employeeName;
        $sb .= PHP_EOL;
        $sb .= "INCOME: " .  $this->monthlyIncome . "\n\n";
        return $sb;
    }
}
