<?php
spl_autoload_register(function ($class) {
    $class = str_replace("\\", "/", $class);
    $class = $class . '.php';

    require_once $class;
});

include 'CalculateInterestApp\Views\inputForm.html';

if (isset($_POST['calculate'])) {
    try{
        $deposit = new \CalculateInterestApp\Entities\Deposit(
            $_POST['amount'],
            $_POST['currency'],
            $_POST['interestAmount'],
            $_POST['period']
        );

        echo "<h2>" . number_format($deposit->amountAfterInterestAccumulation(), 2, '.', '') . "</h2>";
    }catch (Exception $e){
        echo $e->getMessage();
    }
}
?>