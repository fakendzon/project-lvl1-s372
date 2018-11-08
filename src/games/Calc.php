<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\game;
use function BrainGames\Cli\welcome;
use function \cli\line;

const OPERATIONS = ['-', '+', '*'];

function run()
{
    welcome();
    line("What is the result of the expression?");

    $generateQuestion = function () {
        $num1      = rand(1, 10);
        $num2      = rand(1, 10);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        return "{$num1} {$operation} {$num2}";
    };

    $getRightAnswer = function ($question) {
        return eval("return {$question};");
    };

    game($getRightAnswer, $generateQuestion);
}
