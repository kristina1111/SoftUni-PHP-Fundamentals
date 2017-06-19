<?php

class Student
{
    public $name;
    public $score;

    public $makeUpExamsCount;

    /**
     * Student constructor.
     * @param $name
     * @param $score
     */
    public function __construct($name, $score)
    {
        $this->name = $name;
        $this->score = $score;
        $this->makeUpExamsCount = 0;
    }

    public function __toString()
    {
        $output = "</td><td>";
        $output .= $this->name . "</td><td>";
        $output .= $this->score . "</td><td>";
        $output .= $this->makeUpExamsCount . "</td></tr>";
        return $output;
    }

}

class Exam
{
    /**
     * @var Student[]
     */
    public $students;
    public $name;

    /**
     * Exam constructor.
     * @param $name
     * @param array $studentArr
     */
    public function __construct($name, $studentArr = [])
    {
        $this->name = $name;
        $this->students = $studentArr;
    }

    public function sortStudents()
    {
        /**
         * @param $st1 Student
         * @param $st2 Student
         * @return bool|int
         */
        $cmp = function($st1, $st2){
            if($st1->score==$st2->score){
                if($st1->makeUpExamsCount==$st2->makeUpExamsCount){
                    return strcmp($st1->name, $st2->name);
                }else{
                    return $st1->makeUpExamsCount>$st2->makeUpExamsCount;
                }
            }else{
                return $st1->score < $st2->score;
            }
        };


        usort($this->students, $cmp);
    }


}


//var_dump($_GET);

//$input = ["string"=> "Georgi Petrov - Java : 360,
//Marina - JavaScript : 200,
//Marina     -    JavaScript :     300,
//Vasil Dimitrov - PHP : 120,
//Vasil Dimitrov-PHP: 550,
//Vasil Dimitrov - PHP : 250"];
//$input = ["string"=> "Vasil Dimitrov - Java : 400, Vasil Dimitrov - Java : 250"];


$inputArr = explode(',', trim($_GET['string']));
//$inputArr = explode(',', trim($input['string']));

//Contains exams, key = exam name, value = object Exam
$examArr = [];

foreach ($inputArr as $info){
    $workingInfo = explode('-', trim($info));
    $studentName = trim($workingInfo[0]);
    $examInfo = explode(':', $workingInfo[1]);
    $examName = trim($examInfo[0]);
    $examScore = trim($examInfo[1]);
    if(!filter_var($examScore, FILTER_VALIDATE_INT)){
        continue;
    }
    $examScore = intval($examScore);

    if($examScore<0 || $examScore>400){
        continue;
    }

    $newStudent = new Student($studentName, $examScore);


    if(!array_key_exists($examName, $examArr)){
        $exam = new Exam($examName);
        $examArr[$examName] = $exam;
    }

    /**
     * @var $examArr[$examName]
     */
    if(!array_key_exists($studentName, $examArr[$examName]->students)){
        $examArr[$examName]->students[$studentName] = $newStudent;
    }else{
        $examArr[$examName]->students[$studentName]->makeUpExamsCount++;
        if($examScore > $examArr[$examName]->students[$studentName]->score){
            $examArr[$examName]->students[$studentName]->score = $examScore;
        }
    }

//    $examArr[$examName]->sortStudents();

//    var_dump($studentName);
//    var_dump($examName);
//    var_dump($examScore);
}

$output = "<table>" . PHP_EOL . "<tr><th>Subject</th><th>Name</th><th>Result</th><th>MakeUpExams</th>";

/**
 * @var $examObj Exam
 */
foreach ($examArr as $examObj){
    $examObj->sortStudents();
}

foreach ($examArr as $key => $value){
    /**
     * @var $student Student
     */
    foreach ($value->students as $student){
        $output .= PHP_EOL . "<tr><td>" . $key;
        $output .= $student;
    }
}
$output .= PHP_EOL . "</table>";
//var_dump($output);
echo $output;
