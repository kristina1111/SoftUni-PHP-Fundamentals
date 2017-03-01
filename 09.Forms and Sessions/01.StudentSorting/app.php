<?php

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once $class;
});

include_once "StudentsApp/Views/AddStudents.php";

if (!(empty($_POST['firstName']) && empty($_POST['secondName']) && empty($_POST['email']) && empty($_POST['examScore']))
    && isset($_POST['submitStudentForm'])
) {
    $firstNameArr = $_POST['firstName'];
    $secNameArr = $_POST['secondName'];
    $emailArr = $_POST['email'];
    $scoreArr = $_POST['examScore'];
    $studentsArr = [];
    try {
        for ($i = 0; $i < count($firstNameArr) - 1; $i++) { //to count($firstNameArr)-1 because we use template for dynamic adding fields and they also get in the arrays but are empty;
            if (empty($firstNameArr[$i]) || empty($secNameArr[$i]) || empty($emailArr[$i]) || empty($scoreArr[$i])) {
                throw new Exception("All fields must be filled!");
            }
        }


        for ($i = 0; $i < count($firstNameArr) - 1; $i++) {
            $student = new \StudentsApp\Entities\Student($firstNameArr[$i], $secNameArr[$i], $emailArr[$i], $scoreArr[$i]);
            $studentsArr[$student->getEmail()] = $student; // save student in associative array as keys their email because email must be unique
        }

        $property = $_POST['howSort'];
        $ascendingOrDescending = $_POST['howOrder'];
        $studentsArr = sortByProperty($studentsArr, $property, $ascendingOrDescending);
        include_once "StudentsApp/Views/SortedStudentsTable.php";


    } catch (Exception $e) {
        echo $e->getMessage();
    }


//        echo "<pre>";
//        print_r($studentsArr);
}

function sortByProperty(array $students, string $property, string $ascendingOrDescending)
{
    $sortableArr = [];
    $sortedArr = [];
    $isNum = false;
    switch ($property) {
        case "firstName":
            $cmd = "getFirstName";
            $sortableArr = rewriteArr($students, $cmd);
            break;
        case "secondName":
            $cmd = "getSecondName";
            $sortableArr = rewriteArr($students, $cmd);
            break;
        case "email":
            $cmd = "getEmail";
            $sortableArr = rewriteArr($students, $cmd);
            break;
        case "examScore":
            $cmd = "getExamScore";
            $sortableArr = rewriteArr($students, $cmd);
            $isNum = true;
            break;
        default:
            throw new Exception("No such sorting command exists!");
    }

//    print_r($sortableArr);
    switch ($ascendingOrDescending) {
        case "descending":
            if ($isNum) {
                uasort($sortableArr, function ($a, $b) {
                    return $a < $b;
                });
            } else{
                uasort($sortableArr, function ($a, $b) {
                    return strcmp($b, $a);
                });
            }
            break;
        case "ascending":
            if ($isNum) {
                uasort($sortableArr, function ($a, $b) {
                    return $a > $b;
                });
            } else{
//                uasort($sortableArr, $customSort);

                uasort($sortableArr, function ($a, $b) {
                    return strcmp($a, $b);
                });
            }
            break;
        default:
            throw new Exception("No such sorting command exists!");
    }

//    print_r($sortableArr);
    foreach ($sortableArr as $key=>$value){
        $sortedArr[$key] = $students[$key];
    }
//    print_r($sortedArr);
    return $sortedArr;
}

/**
 * @param array $students
 * @param string $cmd
 * @return array
 */
function rewriteArr(array $students, string $cmd)
{
    $sortableArr = [];
    /** @var \StudentsApp\Entities\Student $student */
    foreach ($students as $key => $student) {
        $sortableArr[$key] = $student->$cmd();
    }
    /** @var array $sortableArr */
    return $sortableArr;
}



?>