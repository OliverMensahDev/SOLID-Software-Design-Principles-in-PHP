<?php 

namespace app\notification;

use app\personnel\Employee;

interface EmployeeNotifier
{
  public function notify(Employee $employee);
}