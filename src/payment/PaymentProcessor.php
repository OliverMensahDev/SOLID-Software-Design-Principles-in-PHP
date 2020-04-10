<?php

namespace app\payment;

use app\notification\EmployeeNotifier;
use app\persistence\EmployeeRepoInterface;

class PaymentProcessor
{

  private $employeeRepository;
  private $employeeNotifier;

  public function __construct(EmployeeRepoInterface $employeeRepository, EmployeeNotifier $employeeNotifier)
  {
    $this->employeeRepository = $employeeRepository;
    $this->employeeNotifier = $employeeNotifier;
  }

  public function sendPayments()
  {
      $employees = $this->employeeRepository->findAll();
      $totalPayments = 0;

      foreach ($employees as $employee) {
        $totalPayments += $employee->getMonthlyIncome();
        $this->employeeNotifier->notify($employee);
      }
      return $totalPayments;
  }
}