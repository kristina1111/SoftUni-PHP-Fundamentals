<?php



spl_autoload_register(function($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once $class;
});

const ANIMALS = array('dog', 'cat', 'frog', 'kitten', 'tomcat');
$animals = [];
$type = \AnimalsApp\IO\ConsoleIO::readLine();
while (strtolower($type) != "beast!"){
    $info = explode(' ', \AnimalsApp\IO\ConsoleIO::readLine());
    $animal = null;
    try{
        if(count($info)===3) {
            if (in_array(strtolower($type), ANIMALS)) {
                $cmd = "AnimalsApp\\Entities\\" . ucfirst(strtolower($type));
                $animal = new $cmd($info);
                $animals[] = $animal;
            } else {
                throw new Exception("Invalid input!");
            }
        }
    }catch (Exception $e){
        \AnimalsApp\IO\ConsoleIO::write($e->getMessage());
        break;
    }

    $type = \AnimalsApp\IO\ConsoleIO::readLine();
}
if(count($animals)>0){
    /** @var Animal $a */
    foreach ($animals as $a){
        ConsoleIO::write($a);
    }
}