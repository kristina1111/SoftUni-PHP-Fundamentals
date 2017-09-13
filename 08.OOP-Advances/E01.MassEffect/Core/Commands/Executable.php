<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 13.9.2017 г.
 * Time: 12:27 ч.
 */

namespace Core\Commands;


interface Executable
{
    public function execute(array $args = []): string;
}