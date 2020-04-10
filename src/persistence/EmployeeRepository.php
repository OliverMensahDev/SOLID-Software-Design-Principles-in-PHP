<?php

namespace app\persistence;

use app\personnel\FullTimeEmployee;
use app\personnel\PartTimeEmployee;
use app\personnel\Intern;
use app\personnel\Employee;

/*
Helper method to perform CRUD operations on employees. In a production
application we could use the database for persistence. In this demo,
we are storing employees in the file system.
 */


class EmployeeRepository implements EmployeeRepoInterface
{
    private $serializer;

    public function __construct(EmployeeFileSerializer $serializer)
    {
        $this->serializer = $serializer;
    }

    public function findAll(): array
    {
        $employees = [];

        $myfile = fopen("../../resources/employees.csv", "r") or die("Unable to open file!");
        while (!feof($myfile)) {
            $employee = $this->createEmployeeFromCsvRecord(fgets($myfile));
            $employees[] = $employee;
        }
        fclose($myfile);
        return $employees;
    }

    public function save(Employee $employee)
    {
        $serializedString = $this->serializer->serialize($employee);
        $logFilePath = "../logs/" . str_replace(" ", "_", $employee->getFullName()) . ".rec";
        $logFileDirectory = dirname($logFilePath);
        if (!is_dir($logFileDirectory)) {
            mkdir($logFileDirectory, 0777, true);
        }
        touch($logFilePath);
        file_put_contents(
            $logFilePath,
            $serializedString
        );
    }

    private function createEmployeeFromCsvRecord(string $line): Employee
    {
        $employeeRecord = explode(",", $line);
        $name = $employeeRecord[0];
        $income = (int) $employeeRecord[1];
        $nbHours = (int) $employeeRecord[2];
        $employee = null;
        if ($nbHours == 40) {
            $employee = new FullTimeEmployee($name, $income);
        } else if ($nbHours == 20) {
            $employee = new PartTimeEmployee($name, $income);
        } else {
            $employee = new Intern($name, $income, $nbHours);
        }
        return $employee;
    }
}
