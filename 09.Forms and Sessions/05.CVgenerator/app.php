<?php

spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once $class;
});
session_start();

$_SESSION['error'] = "";
include 'CVgeneratorApp\Config\constants.php';

include 'Layout.php';
try {
    if(isset($_POST['generateCV'])) {
        if (isset($_POST["firstName"])
            && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['phoneNum'])
            && isset($_POST['gender']) && isset($_POST['birthday']) && isset($_POST['nationality'])
        ) {
            $firstName = $_POST["firstName"];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $phone = $_POST['phoneNum'];
            $gender = $_POST['gender'];
            $birthday = $_POST['birthday'];
            $nationality = $_POST['nationality'];


            $person = new \CVgeneratorApp\Entities\Person($firstName, $lastName, $email, $phone, $gender, $birthday, $nationality);
            $person->addLastWorkPosition($_POST['lastEmployer'], $_POST['startWithLastEmployer'], $_POST['endWithLastEmployer']);
            $person->addProgrammingLangs($_POST['programmingLangs'], $_POST['levelProgrammingLang']);
            $person->addLanguages($_POST['languages'], $_POST['comprehension'], $_POST['reading'], $_POST['writing']);
            $person->addDriversLicense($_POST['driversLicense']);

//        echo "<pre>";
//        print_r($person);

            include 'CVgeneratorApp\Views\outputCV.php';
//    echo "<pre>";
//    print_r($_POST);
        } else {
            throw new Exception("All fields must be filled!");
        }
    }

} catch (\Exception $e) {
    echo "<h1>" . $e->getMessage() . "</h1>";
    $_SESSION['error'] = $e->getMessage();
}