<?php

namespace PizzaApp\Core\Commands;


interface Executable
{
    public function execute(array $args = []);
}