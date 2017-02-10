<?php
/*
 * Define a class Employee that holds the following information: name, salary, position, department, email and age.
The name, salary, position and department are mandatory while the rest are optional.
Your task is to write a program which takes N lines of employees from the console and calculates the department
with the highest average salary and prints for each employee in that department his name, salary, email and age –
sorted by salary in descending order. If an employee doesn’t have an email – in place of that field you should print
“n/a” instead, if he doesn’t have an age – print “-1” instead. The salary should be printed to two decimal places
after the seperator.

Sample input 1:
4
Pesho 120.00 Dev Development pesho@abv.bg 28
Toncho 333.33 Manager Marketing 33
Ivan 840.20 ProjectLeader Development ivan@ivan.com
Gosho 0.20 Freeloader Nowhere 18

Sample input 2:
6
Stanimir 496.37 Temp Coding stancho@yahoo.com
Yovcho 610.13 Manager Sales
Toshko 609.99 Manager Sales toshko@abv.bg 44
Venci 0.02 Director BeerDrinking beer@beer.br 23
Andrei 700.00 Director Coding
Popeye 13.3333 Sailor SpinachGroup popeye@pop.ey

 */
require_once "Employee.php";

$inputNum = trim(fgets(STDIN));
$employeeArrByDepartment = [];
while ($inputNum>0){
    $inputArr = array_map('trim', array_filter(explode(' ', trim(fgets(STDIN)))));
    $employee = new Employee($inputArr[0], $inputArr[1], $inputArr[2], $inputArr[3]);
    if(isset($inputArr[4])){
        if(!strpos($inputArr[4], '@')){
            $employee->setAge($inputArr[4]);
        }else{
            $employee->setEmail($inputArr[4]);
        }

        if(isset($inputArr[5])){
            $employee->setAge($inputArr[5]); // if position 5 exists it is always the age of the employee;
        }
    }

    // we create associative array with keys that are the department and values that are each employee from that department
    $employeeArrByDepartment[$inputArr[3]]["employeesInDep"][] = $employee;

    $inputNum--;
}
// For sorting each employee by salary and calculating average salary for each department
foreach ($employeeArrByDepartment as $key => &$value) {
    usort($value["employeesInDep"], "sortEmployeesBySalary"); //first sort the employees in each department by salary in descending order
    $value["averageSalary"] = calculateAverageSalary($value["employeesInDep"]); // then calculate the average salary in each department and save it as second item in the $value array
}

// Then sort the departments in descending order by salary and keeping the key-value association - see function below
$employeeArrByDepartment = sortDepartmentsBySalary($employeeArrByDepartment);

//print_r($employeeArrByDepartment);
//For printing
foreach ($employeeArrByDepartment as $key => $value){
    echo "Highest Average Salary: " . $key . PHP_EOL;
    foreach ($value["employeesInDep"] as $employee) {
        echo $employee->iteratePropertiesForPrint(); //??????? need to ignore this
    }

    break; // break after the first loop because we need to print only the first department with the highest average salary
}



function calculateAverageSalary(array $employeesInDep) : float {
    $averageSalary = 0;
    foreach ($employeesInDep as $employee){
        $averageSalary+=$employee->getSalary();
    }
    $averageSalary /= count($employeesInDep);
    return $averageSalary;
}

function sortEmployeesBySalary(Employee $a, Employee $b){
    return $b -> getSalary() > $a -> getSalary();
}

function sortDepartmentsBySalary(array $a){
    $sortableArr = array();
    $sortedArr = array();
    foreach ($a as $key0=>$value0){
        foreach ($value0 as $key1=>$value1){
            if($key1 == "averageSalary"){
                $sortableArr[$key0] = $value1;
            }
        }
    }
    arsort($sortableArr);
    foreach ($sortableArr as $key=>$value){
        $sortedArr[$key] = $a[$key];
    }
    return $sortedArr;
}