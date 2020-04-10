<?php 

namespace app\persistence;

use app\personnel\Employee;

interface EmployeeRepoInterface
{
  public function findAll();
  public function save(Employee $employee);
}