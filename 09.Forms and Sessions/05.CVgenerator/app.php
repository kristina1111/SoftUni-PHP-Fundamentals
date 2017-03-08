<?php

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once $class;
});

include 'CVgeneratorApp\Config\constants.php';



//session_start();

if(isset($_POST['generateCV'])){
    try {
        $person = new \CVgeneratorApp\Entities\Person($_POST["firstName"], $_POST['lastName'], $_POST['email'], $_POST['phoneNum'], $_POST['gender'], $_POST['birthday'], $_POST['nationality']);
        $person->addLastWorkPosition($_POST['lastEmployer'], $_POST['startWithLastEmployer'], $_POST['endWithLastEmployer']);
        $person->addProgrammingLangs($_POST['programmingLangs'], $_POST['levelProgrammingLang']);
        $person->addLanguages($_POST['languages'], $_POST['comprehension'], $_POST['reading'], $_POST['writing']);
        $person->addDriversLicense($_POST['driversLicense']);

//        echo "<pre>";
//        print_r($person);
    }catch (Exception $e){
        echo "<h1>" . $e->getMessage() . "</h1>";
    }


//    echo "<pre>";
//    print_r($_POST);
}

include 'Layout.php';
