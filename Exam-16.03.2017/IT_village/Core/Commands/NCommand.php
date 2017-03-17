<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.3.2017 г.
 * Time: 10:51 ч.
 */

namespace Core\Commands;


class NCommand extends CommandAbstract implements CommandInterface
{

    public function execute()
    {
        echo "<p>You won! Nakov's force was with you!<p>";
        exit;
    }
}